<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Înregistrare - Mentora</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h3 {
            color: black;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .register-container h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        </style>
    <script>
        function validateForm() {
            const pass = document.getElementById("password").value;
            const confirm = document.getElementById("confirm_password").value;
            if (pass !== confirm) {
                document.getElementById("error").textContent = "Parolele nu se potrivesc.";
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="container">
    <div class="register-form">
        <h3>Înregistrează-te pe Mentora</h3>
        <div id="error" class="error"></div>
        <form action="register_process.php" method="post" onsubmit="return validateForm();">
            <input type="text" name="name" placeholder="Nume complet" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Parolă" required>
            <input type="password" id="confirm_password" placeholder="Confirmă parola" required>
            <button type="submit">Creează cont</button>
        </form>
        <p>Ai deja cont? <a href="login.php">Autentifică-te</a></p>
    </div>
    <div class="image-side"></div>
</div>
</body>
</html>
