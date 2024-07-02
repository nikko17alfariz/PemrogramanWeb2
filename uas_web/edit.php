<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM participants WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta - Aplikasi Pendaftaran Acara</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Peserta</h2>
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                <label for="nama">Menang</label>
                <input type="text" class="form-control" id="menang" name="menang" value="<?php echo $row['menang']; ?>" required>
                <label for="nama">Seri</label>
                <input type="text" class="form-control" id="seri" name="seri" value="<?php echo $row['seri']; ?>" required>
                <label for="nama">Kalah</label>
                <input type="text" class="form-control" id="kalah" name="kalah" value="<?php echo $row['kalah']; ?>" required>
                <label for="nama">Point</label>
                <input type="text" class="form-control" id="point" name="point" value="<?php echo $row['point']; ?>" required>
                
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
