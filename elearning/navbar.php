<style>
    html, body {
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
    }

    .navbar {
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        background: linear-gradient(to right, #a678b4, #6a1b9a);
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        font-family: Arial, sans-serif;
    }

    .navbar a {
        color: white;
        text-decoration: none;
        margin-left: 20px;
        font-weight: bold;
    }

    .navbar a:hover {
        text-decoration: underline;
    }

    .navbar .logo {
        font-size: 22px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    body {
        padding-top: 80px; /* Ca să nu se suprapună conținutul peste navbar */
    }
</style>

<div class="navbar">
    <div class="logo">Mentora</div>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="courses_user.php">Cursuri</a>
        <a href="quiz.php">Quiz</a>
        <a href="results.php">Rezultate</a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Logout</a>
    </div>
</div>
