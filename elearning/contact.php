<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .contact-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fdfdff;
        }

        .contact-container h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .contact-container input,
        .contact-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #bbb;
        }

        .contact-container button {
            background-color: #6a1b9a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        .social-links {
            text-align: center;
            margin-top: 20px;
        }

        .social-links a {
            margin: 0 10px;
            color: #6a1b9a;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="contact-container">
        <h2>Contactează-ne</h2>
        <form method="post" action="#">
            <input type="text" name="name" placeholder="Numele tău" required>
            <input type="email" name="email" placeholder="Adresa de email" required>
            <input type="text" name="subject" placeholder="Subiect" required>
            <textarea name="message" rows="5" placeholder="Mesajul tău..." required></textarea>
            <button type="submit">Trimite</button>
        </form>

        <div class="social-links">
            <p>Ne poți găsi și pe:</p>
            <a href="https://facebook.com" target="https://www.facebook.com/share/1JUJuBc1Pi/?mibextid=wwXXIfr">Facebook</a> |
            <a href="https://instagram.com" target="_blank">Instagram</a> |
            <a href="mailto:contact@mentora.com">Email</a>
        </div>
    </div>
</body>
</html>
