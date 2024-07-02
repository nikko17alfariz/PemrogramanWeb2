<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM participants WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
