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
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="icon/pinterest.png" type="image/x-icon">
</head>
<body class="bg-white">
    <div class="flex">
        <nav class="nav-left align-nav">
            <a href="#" class="icon icon-logo round"></a>
            <a href="#" class="icon icon-home"></a>
            <a href="#" class="icon icon-add"></a>
            <a href="#" class="icon icon-cloche"></a>
            <a href="#" class="icon icon-sms"></a>
        </nav>
        <div class="center" style="margin-left: 75px;width: 100%;height: 70px;postion: relative;">
            <input type="text" name="find" style="width: 80%;height: 45px;margin-top: 10px;margin-left: 15px;border-radius: 10px;">
            <a class="icon icon-profile"></a>
            <a class="icon icon-arrow-down round"></a>
        </div>
        <div class="content" style="width: 100%;height: auto;margin-left: 75px;margin-top: 5px;padding: 12px;">
            <h1>
                <?= "Hello " . $_SESSION['name'];?>
            </h1>
            <a href="logout.php">deconnecter</a>
        </div>
    </div>
</body>
</html>