<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css">
      <?php include 'navbar_admin.php'; ?>
    <style>
         .welcome-box {
            background: white;
            padding: 30px;
            max-width: 400px;
            margin: 40px auto;
            border-radius: 15px;
            text-align: center;
        }
      
    </style>
</head>
<body>
    

    <div class="welcome-box">
    <h1>Bun venit, Administrator <?= htmlspecialchars($_SESSION['user_name']) ?>!</h1>
    <p>Aici poți gestiona cursurile platformei.</p>
</div>


</body>
</html>
