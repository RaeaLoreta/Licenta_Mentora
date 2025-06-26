<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Cursuri</title>
    <link rel="stylesheet" href="style.css">
     <?php include 'navbar.php'; ?>
    <style>

        .course-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px;
        }
        .course-box {
            width: 300px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .course-box img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .course-box h3 {
            color: #6a0dad;
        }
        .course-box p {
            padding: 0 15px;
            color: #333;
        }
        .course-box a {
            display: inline-block;
            margin: 10px;
            background: #6a0dad;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <main>
        <h2>Cursuri Disponibile</h2>
 <div class="course-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="course-box">
                <?php if (!empty($row['image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="Imagine curs">
                <?php endif; ?>
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <a href="add_question.php?id=<?= $row['id'] ?>">Adaugă Întrebări</a>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>