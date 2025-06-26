<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Autentificare - Mentora</title>
    <link rel="stylesheet" href="style.css"> <!-- opțional, dacă ai un fișier CSS -->
    <?php include 'navbar.php'; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h2 {
            color: black;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #7e22ce;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #6b21a8;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Autentificare Mentora</h2>
        <form action="login_process.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Parolă" required>
            <button type="submit">Conectează-te</button>
        </form>
        <a href="register.php">Nu ai cont? Înregistrează-te</a>
    </div>
</body>
</html>
