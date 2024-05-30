<?php
session_start();

$userid = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["userid"]) && is_numeric($_POST["userid"])) {
        $userid = htmlspecialchars(trim($_POST["userid"]));
        
        $valid_user_ids = [123, 456, 789];
        
        if (in_array($userid, $valid_user_ids)) {
            $_SESSION["userid"] = $userid;
            header("Location: index.php");
            exit();
        } else {
            $error = "User ID tidak valid. Silakan coba lagi.";
        }
    } else {
        $error = "Masukkan User ID yang valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Masukkan ID</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="userid">User ID:</label>
        <input type="number" id="userid" name="userid" value="<?php echo htmlspecialchars($userid); ?>" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
