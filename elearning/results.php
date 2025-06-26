<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'], $_SESSION['score'], $_SESSION['total_questions'])) {
    die("Datele nu sunt disponibile.");
}

$user_id = $_SESSION['user_id'];

$name_query = $conn->prepare("SELECT name FROM users WHERE id = ?");
$name_query->bind_param("i", $user_id);
$name_query->execute();
$name_result = $name_query->get_result();
$user = $name_result->fetch_assoc();
$course_id = $_SESSION['course_id'] ?? null;


$_SESSION['name'] = $user['name'];
$score = $_SESSION['score'];
$total = $_SESSION['total_questions'];
$percent = $_SESSION['score_percent'];
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
<!-- HTML mai jos -->
<div class="welcome-box">Felicitări, <?= htmlspecialchars($user['name']) ?>!</h2>
<p>Ai răspuns corect la <?= $score ?> din <?= $total ?> întrebări.</p>
<p>Scor: <?= $percent ?>%</p>

<?php if ($percent >= 70): ?>
    <a href="certificate.php" target="_blank">Descarcă certificatul</a>
<?php else: ?>
    <p>Trebuie să ai minim 70% pentru a primi certificatul.</p>
<?php endif; ?>
