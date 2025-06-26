<?php
require('fpdf/fpdf.php');
session_start();

if (!isset($_SESSION['name'], $_SESSION['score_percent'])) {
    die("Datele nu sunt disponibile.");
}

$name = $_SESSION['name'];
$score = $_SESSION['score_percent'];
$date = date('d.m.Y');

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->Image('fpdf/img/cert-bg.png', 0, 0, 297, 210); // 297x210 = A4 landscape
$pdf->SetFont('Courier', 'B', 40);
$pdf->Cell(0, 20, 'Certificat de Absolvire', 0, 1, 'C');
$pdf->Ln(40);


$pdf->SetFont('Arial', '', 20);
$pdf->MultiCell(0, 10, "Se acorda lui $name pentru finalizarea cu succes a testului cu un scor de $score% la data de $date.", 0, 'C');
$pdf->Ln(80);
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, 'Mentora eLearning Platform', 0, 1, 'C');
$pdf->Output('I', 'certificat_' . $name . '.pdf');
exit;
?>
