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
            if (!empty($pseudo) && !empty($psw) && !empty($email)) {
                $url = "";
                include "To-Do List.php";
                if (createCustomer($pseudo, $psw, $email)) {
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
        <form action="" method="post" class="form-popup">
            <h1 class="center-text">Inscription</h1>
            <br>
            <?php if ($error): ?>
            <p class="message-error center-text"><?= $error;?></p>
            <?php elseif ($succes): ?>
            <p class="message-success center-text"><?= $succes;?></p>
            <?php endif;?>
            <br>
            <div style="width: auto;padding-right: 10px;">
                <label>Pseudo</label>
                <input type="text" name="pseudo" placeholder="Entrer votre pseudo ..." value="<?= $pseudo;?>" required>
            </div>
            <div style="width: auto;padding-right: 10px;">
                <label>Email</label>
                <input type="email" name="email" placeholder="Entrer votre email ..." value="<?= $email;?>" required>
            </div>
            <div style="width: auto;padding-right: 10px;">
                <label>Mot de passe</label>
                <input type="password" name="psw" id="psw" placeholder="Entrer votre mot de passe ..." value="<?= $psw;?>" required>
                <button type="button" style="width: 30px;height: 30px;position: relative;top: -36px;left: 325px;background: url(icon/hide.png) center no-repeat;background-size: 100%;border: 0;" onclick="password(this)"></button>
            </div>
            <input type="submit" value="S'inscrire" class="btn">
            <a href="login.php">se connecter</a>
        </form>
    </div>
    <script src="js/JavaScript.js"></script>
</body>
</html>