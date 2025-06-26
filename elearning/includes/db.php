<?php
// Setările de conexiune la baza de date
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'elearning';
$port = 3307; // important! ai schimbat portul MySQL

// Conectare
$conn = new mysqli($host, $user, $password, $database, $port);

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

// Dacă ajungi aici, totul e OK
// echo "Conexiune reușită!";
?>
