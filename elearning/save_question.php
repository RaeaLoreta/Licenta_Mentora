<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $question = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_option = $_POST['correct_option'];

    // Validare simplă
    if (!in_array($correct_option, ['A', 'B', 'C', 'D'])) {
        echo "Răspunsul corect trebuie să fie A, B, C sau D.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO questions (course_id, question, option_a, option_b, option_c, option_d, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $course_id, $question, $option_a, $option_b, $option_c, $option_d, $correct_option);

    if ($stmt->execute()) {
        header("Location: add_question.php?course_id=" . $course_id);
        exit;
    } else {
        echo "Eroare la salvarea întrebării: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
