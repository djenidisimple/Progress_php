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
    <style>
        .base {
            display: flex;
            justify-content: flex-start;
        }
        .base div {
            margin-right: 25px;
        }
        .box {
            display: inline;
            position: relative;
            float: right;
            width: 250px;
            height: 50px;
            margin-top: 10px;
            margin-right: 20px;
            background: rgb(17, 145, 24);
            border-radius: 5px;
            z-index: 2;
            opacity: 0;
            animation: connected 10s ease-in-out;
        }
        @keyframes connected {
            0% {
                opacity: 1;
                transform: scale(0);
            }
            10% {
                opacity: 1;
                transform: scale(1);
            }
            80% {
                opacity: 1;
                transform: scale(0);
            }
            100% {
                transform: scale(0);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="bg-white">
    <div class="box">
        <div class="center-text" style="height: 100%;color: white;">
            <img src="icon/customer.png" style="width: 25px;height: 25px;margin-right: 8px;">
            Vous êtes connêté! <?= $_SESSION['name'];?>
        </div>
    </div>
    <nav class="nav-left align-nav">
        <a href="" class="icon icon-logo round"></a>
        <a href="#" class="icon icon-home"></a>
        <a href="#" class="icon icon-add"></a>
        <a href="#" class="icon icon-cloche"></a>
        <a href="#" class="icon icon-sms"></a>
    </nav>
    <div class="nav">
        <div style="display: inline;background: rgb(204, 197, 197);border-radius: 10px;margin-left: 106px;width: 80%;height: auto;padding: 18px;">
            <input type="text" name="find" style="width: 65%;height: 45px;margin-top: 6px;border-radius: 10px;">
            |
            <button class="btn hover-gray" style="margin-left: 5px;height: 45px;background: rgb(204, 197, 197);border: 0;color: black;">Vos épingles</button>
        </div>
        <a class="icon icon-arrow-down round" style="float: right;margin-top: 6px;"></a>
        <a class="icon icon-profile" style="margin-top: 9px;"></a>
    </div>
    <div class="content">
        <h1>
            <?= "Hello " . $_SESSION['name'];?>
        </h1>
        <a href="logout.php">deconnecter</a>
    </div>
</body>
</html>