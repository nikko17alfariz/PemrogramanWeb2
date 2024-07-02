<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_registration";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
