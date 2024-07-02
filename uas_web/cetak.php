<?php
session_start();

// Redirect user to login page if not logged in
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

require_once "koneksi.php";

$sql = "SELECT * FROM participants";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">    
</head>

<body>
    <div class="container mt-5">
        <h2>Data Peserta Acara</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Menang</th>
                    <th>seri</th>
                    <th>Kalah</th>
                    <th>point</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["menang"] . "</td>";
                        echo "<td>" . $row["seri"] . "</td>";
                        echo "<td>" . $row["kalah"] . "</td>";
                        echo "<td>" . $row["point"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="cetakData()">Cetak</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script>
        function cetakData() {
            window.print();
        }
    </script>
</body>
</html>
