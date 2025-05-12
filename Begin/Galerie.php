<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $error = $succes = null;
        $path_img = "../img/*.*";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $file = $_FILES ["img"]['tmp_name'];
            $newfile = "../img/upload" . basename($_FILES["img"]["name"]);
    
            if (!move_uploaded_file($file, $newfile)) {
                $error = "La copie $file du fichier a échoué...\n";
            } else {
                $succes = "Upload succes!";
            }
        }
    ?>
    <div class="fullscreen center" id="form">
        <form action="" method="post" class="form-popup" enctype="multipart/form-data">
            <div class="right" style="width: 100%;height: auto;">
                <button class="close" onclick="closeForm()" style="top: 0;">&times;</button>
            </div>
            <div style="height: auto;" class="center">
                <h1 class="center-text">Ajout d'image dans ma Galerie</h1>
            </div>
            <?php if ($error): ?>
            <p class="message-error center-text">
                <?= $error;?>
            </p>
            <?php elseif ($succes): ?>
            <p class="message-success center-text">
                <?= $succes;?>
            </p>
            <?php endif;?>
            <input type="file" name="img">
            <input type="submit" value="Ajouter">
        </form>
    </div>
    <h1 class="center-text white">Ma Galerie</h1>
    <br><hr><br>
    <div class="center" style="height: 100%;">
        <?php
            foreach(glob($path_img) as $filename){
        ?>
        <div style="padding: 10px;" class="img" onmouseover="showBtn('.show')" onmouseout="hideBtn('.show')">
            <div style="width: 200px;height: 200px;border-radius: 200px;background: url('<?= $filename;?>') center;background-size: 100%;"></div>
            <div class="center show" style="width: 100%;height: auto;">
                <div class="center" style="width: 200px;height: 200px;background: rgba(0, 0, 0, 0.5);margin-top: -200px;border-radius: 250px;">
                    <button class="card btn" style="width: 70px;height: 70px;background: black url('icon/trash-bin.png') center no-repeat;background-size: 80%;border: 0;"></button>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <button style="background: white url('icon/plus.png') center no-repeat;background-size: 50%;width: 100px;height: 100px;border-radius: 100%;" class="card btn" onclick="openForm()"></button>
        </div>
    <script src="js/JavaScript.js"></script>
    <script>
        console.log(document.querySelector(".show"))
        function showBtn(value) {
            document.querySelector(value).style.display = "block";
        }
        function hideBtn(value) {
            document.querySelector(value).style.display = "none";
        }
    </script>
</body>
</html>