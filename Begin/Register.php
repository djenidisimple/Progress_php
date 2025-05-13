<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $pseudo = $psw = $email = $succes = $error = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pseudo = $_POST["pseudo"];
            $psw = $_POST["psw"];
            $email = $_POST["email"];
            $photo = $_FILES['img'];
            if (!empty($pseudo) && !empty($psw) && !empty($email)) {
                $url = "";
                include "To-Do List.php";
                if (createCustomer($pseudo, $psw, $email, $photo)) {
                    $succes = "Inscription reussite!";
                    if (getCustomer($pseudo, $psw)) {
                        $_SESSION['name'] = $pseudo;
                        header("Location: home.php");
                        exit;
                    }
                } else {
                    $error = "Cette pseudo existe deja!";
                }
            } else {
                $error = "Tous les champs sont obligatoire!";
            }
        }
    ?>
    <div class="center">
        <form action="" method="post" class="form-popup" enctype="multipart/form-data" style="width: 350px;border-radius: 5px;">
            <h1 class="center-text">Inscription</h1>
            <br>
            <div style="width: auto;padding-right: 10px;height: auto;" class="center">
                <img src="icon/user (2).png" class="photo" id="img">
                <input type="file" class="input-file" accept="image/jpeg, image/png, image/jpg" id="file" name="img" required>
            </div>
            <br>
            <?php if ($error): ?>
            <p class="message-error center-text"><?= $error;?></p>
            <?php elseif ($succes): ?>
            <p class="message-success center-text"><?= $succes;?></p>
            <?php endif;?>
            <br>
            <div style="width: auto;padding-right: 10px;">
                <input type="text" name="pseudo" placeholder="Pseudo ..." value="<?= $pseudo;?>" required>
            </div>
            <div style="width: auto;padding-right: 10px;">
                <input type="email" name="email" placeholder="Email ..." value="<?= $email;?>" required>
            </div>
            <div style="width: 97%;height: 36px;padding-right: 10px;background: rgb(204, 197, 197);border-radius: 5px;">
                <input type="password" style="width: 85%;" name="psw" id="psw" placeholder="Mot de passe ..." value="<?= $psw;?>" required>
                <input class="eyes" style="" type="button" onclick="password(this)">
            </div>
            <br>
            <input type="submit" value="S'inscrire" class="btn center-text" style="border-radius: 5px;height: 40px;">
            <span class="center-text" style="font-size: 14px;">
                Si vous possèdez déja un compte ? <br><a href="login.php">login</a>
            </span>
        </form>
    </div>
    <script src="js/JavaScript.js"></script>
</body>
</html>