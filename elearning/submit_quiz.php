<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['course_id']) || !isset($_POST['answers'])) {
        die("Date lipsă din formular.");
    }

    $course_id = intval($_POST['course_id']);
    $user_answers = $_POST['answers'];
    $user_id = $_SESSION['user_id'] ?? null;

    if (!$user_id) {
        die("Utilizator neautentificat.");
    }

    $stmt = $conn->prepare("SELECT id, correct_option FROM questions WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $total = 0;
    $correct = 0;

    while ($row = $result->fetch_assoc()) {
        $q_id = $row['id'];
        $correct_option = strtoupper(trim($row['correct_option']));
        $total++;

        if (isset($user_answers[$q_id]) && strtoupper(trim($user_answers[$q_id])) === $correct_option) {
            $correct++;
        }
    }

    $score_percent = ($total > 0) ? round(($correct / $total) * 100) : 0;

    // Salvează în baza de date (dacă vrei istoric)
    $insert = $conn->prepare("INSERT INTO results (user_id, course_id, score, created_at) VALUES (?, ?, ?, NOW())");
    $insert->bind_param("iii", $user_id, $course_id, $score_percent);
    $insert->execute();

    // Salvează în sesiune
    $_SESSION['score'] = $correct;
    $_SESSION['total_questions'] = $total;
    $_SESSION['score_percent'] = $score_percent;

    header("Location: results.php");
    exit;
}
?>
