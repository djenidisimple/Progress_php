<?php 
    session_start();
    if (!isset($_SESSION['name'])) {
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>
        <?= "Hello " . $_SESSION['name'];?>
    </h1>
    <a href="logout.php">deconnecter</a>
</body>
</html>