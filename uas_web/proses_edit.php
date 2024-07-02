    <?php
    require_once "koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama = $_POST['nama'];
        $menang = $_POST['menang'];
        $seri = $_POST['seri'];
        $kalah = $_POST['kalah'];
        $point = $_POST['point'];


        $sql = "UPDATE `participants` SET nama`='[$nama]',`menang`='[$menang]',`seri`='[$seri]',`kalah`='[$kalah]',`point`='[$point]' WHERE $nama,$menang,$seri,$kalah,$point ";

        if ($conn->query($sql) === TRUE) {
            header("location: dashboard.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
