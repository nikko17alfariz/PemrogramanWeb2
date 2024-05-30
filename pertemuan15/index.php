<?php
session_start();

if (isset($_SESSION["userid"])) {
    $userid = htmlspecialchars($_SESSION["userid"]);
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .content { margin-top: 50px; text-align: center; }
    </style>
</head>
<body>
    <div class="content">
        <h2>Selamat Datang, <?php echo $userid; ?>!</h2>
        <p>Anda telah berhasil login.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
