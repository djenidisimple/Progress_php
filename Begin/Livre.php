<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include_once '../Config/function.php';
        $file = "Data/message.txt";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $message = htmlspecialchars($_POST['message']);
            if (!empty($pseudo) && !empty($message)) {
                // Écrit le message dans le fichier
                writeInFile($file, "$pseudo:", "$message");
            }
        }
    ?>
    <div class="center">
        <div class="card" style="height: 520px;">
            <h1 class="center-text">Les messages</h1>
            <p class="center-text">Voici les messages laissés par les utilisateurs :</p>
            <br>
            <div class="center-box" style="height: 340px;overflow-y: auto;background-color:rgb(207, 205, 205);padding: 20px;">
                <?php
                    $lines = file('Data/message.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    // Vérifie si le fichier est vide
                    if (empty($lines)) {
                        echo "<p>Aucun message trouvé.</p>";
                    } else {
                        $j = 1;
                        // Affiche toutes les lignes du tableau comme code HTML, avec les numéros de ligne
                        for ($i = 0; $i < count($lines); $i+=2) {
                            echo '<div class="message">';
                            echo  "<h2>" . htmlspecialchars($lines[$i]) . "</h2>";
                            echo "<p>" . htmlspecialchars($lines[$j]) . "</p>";
                            echo "</div>";
                            $j=$i+1;
                ?>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="center-box" style="height: 65px;">
                <button type="button" class="btn" onclick="openForm()">Laisser un message</button>
            </div>
        </div>
    </div>
    <div class="fullscreen" id="form">
        <form action="" method="post" class="form-popup" style="width: 360px;height: 350px;">
            <button class="close" onclick="closeForm()">&times;</button>
            <br>
            <h2 class="center-text">Bienvenue sur le livre d'or</h2>
            <p class="center-text">Merci de laisser un message !</p>
            <label>Pseudo :</label>
            <input type="text" name="pseudo" placeholder="Entrer ici votre pseudo..." required>
            <label>Message :</label>
            <textarea name="message" placeholder="Entrer ici le message..." required></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    <script src="js/JavaScript.js"></script>
</body>
</html>