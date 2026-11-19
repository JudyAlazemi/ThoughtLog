<?php
header('Referrer-Policy: no-referrer'); // keeps the reset token out of other sites' logs

function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}


$token = $_POST['token'] ?? $_GET['token'] ?? '';
if (!is_string($token)) {
    $token = '';
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['password_confirmation'] ?? '';

    if ($token === '') {
        $errors[] = 'This reset link is invalid or has expired.';
    }
    if (strlen($password) < 8 || strlen($password) > 72) {
        $errors[] = 'Password must be 8 to 72 characters.';
    }
    if ($password !== $confirm) {
        $errors[] = 'Passwords do not match.';
    }

    if (!$errors) {
        try {
            $pdo = new PDO(
                'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . ';charset=utf8mb4',
                getenv('DB_USER'),
                getenv('DB_PASSWORD'),
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            // Tokens are stored hashed, so a leaked database can't be used to reset passwords
            $stmt = $pdo->prepare('SELECT email FROM password_resets WHERE token_hash = ? AND expires_at > NOW()');
            $stmt->execute([hash('sha256', $token)]);
            $email = $stmt->fetchColumn();

            if ($email === false) {
                $errors[] = 'This reset link is invalid or has expired.';
            } else {
                $pdo->beginTransaction();
                $pdo->prepare('UPDATE users SET password = ? WHERE email = ?')
                    ->execute([password_hash($password, PASSWORD_DEFAULT), $email]);
                $pdo->prepare('DELETE FROM password_resets WHERE email = ?') // link works only once
                    ->execute([$email]);
                $pdo->commit();

                $success = true;
            }
        } catch (PDOException $ex) {
            if (isset($pdo) && $pdo->inTransaction()) {
                $pdo->rollBack();
            }
            error_log($ex->getMessage());
            $errors[] = 'Something went wrong. Please try again later.';
        }
    }
}