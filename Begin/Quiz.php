<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $quiz = [
            'question' => '1 === 1 // => ? (JavaScript)',
            'answers' => [
                'true',
                'null',
                'false',
                'NaN',
                'true'
            ]
        ];
        $question = array_unique($quiz['answers']);
        function correctAnswer(array $quiz, string $answer):bool
        {
            $answers = array_count_values($quiz['answers']);
            return $answers[$answer] === 2;
        }
        $error = $succes = $get_answer = $value_checked = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $get_answer = $_POST['answer'];
            if (!empty($get_answer)) {
                if (correctAnswer($quiz, $get_answer)) {
                    $succes = "La réponse est correcte!";
                } else {
                    $error = "La réponse est incorrecte!";
                }
            } else {
                $error = "Vous n'avez pas séléctioner de réponse!";
            }
        }
    ?>
    <div class="center">
        <form action="" method="post" class="card">
            <h1>Quiz Niveau 1</h1>
            <hr>
            <h2 class="center-text"><?php echo $quiz['question'];?></h2>
            <br>
            <?php if ($succes): ?>
            <p class="message-success center-text"><?= $succes;?></p>
            <?php elseif ($error):?>
            <p class="message-error center-text"><?= $error;?></p>
            <?php endif;?>
            <br>
            <?php
                foreach ($question as $key => $value) {
                    $value_checked = ($value == $get_answer) ? 'checked' : null;
            ?>
                <div class="card center" style="width: 100%;height: 40px;justify-content: left;">
                    <input type="radio" name="answer" id="" style="width: 15px;height: 15px;" value="<?php echo $value;?>"<?php echo " ".$value_checked;?>>
                    <span style="font-size: 20px;margin-left: 5px;"><?php echo $value;?></span>
                </div>
            <?php
                }
            ?>
            <br>
            <div class="center" style="width: 100%;height: 40px;">
                <button type="submit" class="btn" style="width: 100%;border-radius: 5px;">Envoyer</button>
            </div>
        </form>
    </div>
</body>
</html>