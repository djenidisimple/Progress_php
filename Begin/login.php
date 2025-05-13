<?php 
    session_start();
    if (isset($_SESSION['name'])) {
        header("Location: Home.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $pseudo = $psw = $error = $pseudo = $psw = $succes = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pseudo = $_POST["pseudo"];
            $psw = $_POST["psw"];
            if (empty($pseudo) && empty($psw)) {
                $error = "Tous les champs sont obligatoire!";
            } else {
                $url = "";
                include "To-Do List.php";
                if(!getCustomer($pseudo, $psw)) {
                    $error = "Le pseudo ou mot de passe est incorrecte!";
                } else {
                    $succes = "Vous etes connecter!";
                    $_SESSION['name'] = $pseudo;
                    header("Location: Home.php");
                }
            }
        }
    ?>
    <div class="center" style="height: 100px;">
        <form class="form-popup" method="post">
            <h1 class="center-text">Connexion</h1>
            <br>
            <?php if ($error):?>
            <p class="message-error center-text"><?= $error;?></p>
            <?php elseif ($succes):?>
            <p class="message-success center-text"><?= $succes;?></p>
            <?php endif;?>
            <br>
            <div style="width: auto;padding-right: 10px;">
                <label>Pseudo</label>
                <input type="text" name="pseudo" placeholder="Entrer ici votre pseudo..." value="<?= $pseudo;?>" required>
            </div>
            <div style="width: auto;padding-right: 10px;">
                <label>Mot de passe</label>
                <input type="password" name="psw" id="psw" placeholder="Entrer ici votre mot de passe..." value="<?= $psw;?>" required>
                <button type="button" style="width: 30px;height: 30px;position: relative;top: -36px;left: 325px;background: url(icon/hide.png) center no-repeat;background-size: 100%;border: 0;" onclick="password(this)"></button>
            </div>
            <button class="btn" type="submit" style="width: 100%;">se connecter</button>
            <br>
            <a href="Register.php">s'inscrire</a>
        </form>
    </div>
    <script src="js/JavaScript.js"></script>
</body>
</html>