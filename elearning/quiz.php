<?php
require 'config.php';
session_start();

if (!isset($_GET['id'])) {
    die("Cursul nu a fost specificat.");
}

$course_id = intval($_GET['id']);

// Obține titlul cursului
$course_stmt = $conn->prepare("SELECT title FROM courses WHERE id = ?");
$course_stmt->bind_param("i", $course_id);
$course_stmt->execute();
$course_result = $course_stmt->get_result();

if ($course_result->num_rows === 0) {
    die("Cursul nu a fost găsit.");
}
$course = $course_result->fetch_assoc();
$course_title = $course['title'];

// Obține întrebările
$query = $conn->prepare("SELECT * FROM questions WHERE course_id = ?");
$query->bind_param("i", $course_id);
$query->execute();
$question_result = $query->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test - <?= htmlspecialchars($course_title) ?></title>

<?php include 'navbar.php'; ?>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('images/bg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    height: 100vh;
}
    .quiz-container {
    max-width: 700px;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.15);
}

.quiz-title {
    text-align: center;
    font-size: 26px;
    color: #6a0dad;
    margin-bottom: 25px;
}

.question-box {
    margin-bottom: 25px;
    padding: 15px;
    border-left: 4px solid #6a0dad;
    background-color: #f9f9f9;
    border-radius: 10px;
}

.question-text {
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.option {
    margin: 5px 0;
}

.option label {
    color: #222;
    font-size: 16px;
}

.submit-button {
    background: #6a0dad;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
    transition: 0.3s;
}

.submit-button:hover {
    background: #550aa2;
}
</style>
</head>

<body>
    <div class="quiz-container">
        <h2>Test pentru cursul: <?= htmlspecialchars($course_title) ?></h2>
        <form action="submit_quiz.php" method="POST">
            <input type="hidden" name="course_id" value="<?= $course_id ?>">
            <?php while ($q = $question_result->fetch_assoc()): ?>
                <div class="question">
                    <p><strong><?= htmlspecialchars($q['question']) ?></strong></p>
                    <?php foreach (['a', 'b', 'c', 'd'] as $opt): ?>
                        <label>
                            <input type="radio" name="answers[<?= $q['id'] ?>]" value="<?= strtoupper($opt) ?>" required>
                            <?= htmlspecialchars($q['option_' . $opt]) ?>
                        </label><br>
                    <?php endforeach; ?>
                </div>
            <?php endwhile; ?>
            <button type="submit">Trimite testul</button>
        </form>
    </div>
</body>
</html>
