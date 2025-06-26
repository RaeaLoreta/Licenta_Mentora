<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("Curs invalid.");
}

$course_id = intval($_GET['id']);
$result = $conn->query("SELECT title FROM courses WHERE id = $course_id");
$course = $result->fetch_assoc();

if (!$course) {
    die("Curs inexistent.");
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Adaugă Întrebare</title>
    <link rel="stylesheet" href="style.css">
    <?php include 'navbar.php'; ?>
    <style>
      

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
        }

        h2 {
            text-align: center;
            color: white;
            margin-top: 40px;
            font-size: 26px;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
            text-color: #000000 ;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-top: 5px;
            font-size: 14px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #6a0dad;
            border: none;
            border-radius: 8px;
       
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #5300a3;
        }
    </style>
</head>
<body>

<h2>Adaugă întrebare pentru cursul: <?= htmlspecialchars($course['title']) ?></h2>

<div class="container">
    <form method="POST" action="save_question.php">
        <input type="hidden" name="course_id" value="<?= $course_id ?>">

        <label style="color: black;">Întrebarea:</label>
        <textarea name="question" id="question" rows="3" required></textarea>

        <label style="color: black;">Opțiunea A:</label>
        <input type="text" name="option_a" id="option_a" required>

        <label style="color: black;">Opțiunea B:</label>
        <input type="text" name="option_b" id="option_b" required>

        <label style="color: black;">Opțiunea C:</label>
        <input type="text" name="option_c" id="option_c" required>

        <label style="color: black;">Opțiunea D:</label>
        <input type="text" name="option_d" id="option_d" required>

        <label for="correct_option" style="color:black;">Răspuns corect:</label>
        <select name="correct_option" id="correct_option" required style="width: 100%; padding: 10px; border-radius: 10px; margin-bottom: 20px;">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
            </select>


        <button type="submit">Adaugă Întrebarea</button>
    </form>
</div>

</body>
</html>
