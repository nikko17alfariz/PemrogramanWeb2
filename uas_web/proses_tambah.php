<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];

    $nama = mysqli_real_escape_string($conn, $nama);

    $sql = "INSERT INTO participants (nama ) VALUES ('$nama')";

    if ($conn->query($sql) === TRUE) {
        header("location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
