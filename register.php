
<?php
session_start([
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax',
]);
 

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
 
function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
 
$errors = [];
$success = false;
$name = '';
$email = '';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['password_confirmation'] ?? '';
 
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        $errors[] = 'Invalid request. Please refresh and try again.';
    }
    if ($name === '' || strlen($name) > 100) {
        $errors[] = 'Please enter your name (up to 100 characters).';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
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
 
            
            $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
 
            $success = true;
            $name = $email = '';
            $_SESSION['csrf'] = bin2hex(random_bytes(32)); // fresh token after use
        } catch (PDOException $ex) {
            if (($ex->errorInfo[1] ?? null) == 1062) {
                $errors[] = 'That email is already registered.';
            } else {
                error_log($ex->getMessage()); // log details privately, never show them
                $errors[] = 'Something went wrong. Please try again later.';
            }
        }
    }
}