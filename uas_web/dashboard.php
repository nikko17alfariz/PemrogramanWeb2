<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

require_once "koneksi.php";

function searchParticipants($conn, $keyword) {
    $sql = "SELECT * FROM participants WHERE nama LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchParam = "%$keyword%";
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

$result = null;

if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
    $result = searchParticipants($conn, $searchKeyword);
} else {
    $sql = "SELECT * FROM participants";
    $result = $conn->query($sql);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-10 mb-5">
        <h2>Data Group B  
Per 23 Juni 2024 13:58:16 (20.37/02.07.2024) 
Nikko Alfarizki(211011400883)</h2>

        <!-- Form Pencarian -->
        <form class="form-inline mb-3" method="GET">
            <div class="form-group mr-2">
                <input type="text" class="form-control" name="search" placeholder="Negara">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        
        <!-- Tabel Data -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Negara</th>
                    <th>Menang</th>
                    <th>Seri</th>
                    <th>Kalah</th>
                    <th>point</th>
                    <th>Aksi</th>
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
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>";
                        echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger ml-2'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- Tombol Aksi -->
        <a href="tambah.php" class="btn btn-primary">Tambah Peserta</a>
        <a href="cetak.php" class="btn btn-success">Cetak Data</a>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>
