<?php session_start(); ?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">

<html>
<head>
    <meta charset="UTF-8">
    <title> Login</title>
    
</head>
<body>
    <h1>Log in</h1>

    <?php if (!empty($_GET['error'])): ?>
        <div class="error">Invalid username or password.</div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="user">Username</label>
        <input type="text" id="user" name="user" required autofocus>

        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" required>

        <button type="submit">Log in</button>
    </form>

    
</body>
</html>
