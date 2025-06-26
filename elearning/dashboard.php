<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Utilizator</title>
    <link rel="stylesheet" href="style.css">
    <?php include 'navbar.php'; ?>
    <style>



        .container {
            text-align: center;
            margin-top: 100px;
        }

        .container h1 {
            font-size: 36px;
            color: #2e003e;
        }
    </style>
</head>
<body>
   

    <div class="welcome-box"> Bine ai venit, <?= htmlspecialchars($_SESSION['user_name']) ?>!
</div>

</body>
</html>
