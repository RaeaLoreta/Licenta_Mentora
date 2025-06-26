<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Salvare imagine

if (!empty($_FILES['image']['name'])) {
    $image_name = basename($_FILES['image']['name']);
    $image_target = "uploads/" . $image_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);
} else {
    $image_name = null;
}



    // Inserare în baza de date
   $stmt = $conn->prepare("INSERT INTO courses (title, description, image) VALUES (?, ?, ?)");
    if (!$stmt) {
    die("Eroare SQL la prepare(): " . $conn->error);
    $stmt->bind_param("ssss", $title, $description, $image_path);
    $stmt->execute();

    header("Location: dashboard_admin.php");
    exit();
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Adaugă Curs</title>
    <?php include 'navbar.php'; ?>
    <link rel="stylesheet" href="style.css">

    <style>
        

        form {
            max-width: 500px;
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: auto;
        }

        input, textarea {
            width: 100%;
            margin: 10px 0;
            padding: 8px;
        }

        button {
            padding: 10px 20px;
            background-color: #6a0dad;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #4b0082;
        }

        h2 {
            color: black;
        }

        label {
            color: black;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

    </style>
</head>
<body style="background-image: url('images/bg.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <h2 style="text-align:center; color: white;">Adaugă un Curs Nou</h2>

    <form action="add_courses.php" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 10px;">

        <label for="title" style="color: black; display: block; font-weight: bold;">Titlu curs:</label>
        <input type="text" name="title" id="title" required style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ccc; margin-bottom: 15px;">

        <label for="description" style="color: black; display: block; font-weight: bold;">Descriere curs:</label>
        <textarea name="description" id="description" required rows="4" style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ccc; margin-bottom: 15px;"></textarea>

        <label for="image" style="color: black; display: block; font-weight: bold;">Imagine curs (opțional):</label>
        <input type="file" name="image" id="image" accept="image/*" style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ccc; margin-bottom: 15px;">

        <button type="submit" name="submit" style="width: 100%; background: #6a0dad; color: white; padding: 12px; border: none; border-radius: 10px;">Adaugă Curs</button>
    </form>
</body>

</body>
</html>