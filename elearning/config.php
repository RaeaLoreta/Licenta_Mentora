<?php
$host = '127.0.0.1:3307';
$user = 'root';
$password = '';
$database = 'elearning';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}
?>
