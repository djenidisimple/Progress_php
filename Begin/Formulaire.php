<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact avec envoi d'email</title>
</head>
<body>
    <?php
        $error = $succes = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            if (empty($name) && empty($email) && empty($message)) {
                $error = "Tous les champs sont obligatoires!";
            } else {
                $message = wordwrap($message, 70, "\r\n");
                // Envoi du mail
                require '../PHPMailer-5.2-stable/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = 'djenidigauss@gmail.com';
                $mail->Password = '21/01/2008';
                $mail->setFrom($email, $name);
                $mail->addReplyTo($email, $name);
                $mail->addAddress('djenidigauss@email.com');
                $mail->Subject = 'Hello from PHPMailer!';
                $mail->Body = 'This is a test.';
                //send the message, check for errors
                if (!$mail->send()) {
                    echo "ERROR: " . $mail->ErrorInfo;
                } else {
                    echo "SUCCESS";
                }
            }
        }
    ?>
    <h1>Formulaire de contact avec envoi d'email</h1>
    <form action="" method="post">
        <?php
            if ($succes) {
                echo "<p style='color: green;'>$succes</p>";
            }
            if ($error) {
                echo "<p style='color: red;'>$error</p>";
            }
        ?>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>