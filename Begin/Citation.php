<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $quote = [
            ["The only limit to our realization of tomorrow is our doubts of today." , "Franklin D. Roosevelt"],
            ["The future belongs to those who believe in the beauty of their dreams." , "Eleanor Roosevelt"],
            ["In the end, we will remember not the words of our enemies, but the silence of our friends." , "Martin Luther King Jr."],
            ["Life is what happens when you're busy making other plans." , "John Lennon"],
            ["The purpose of our lives is to be happy." , "Dalai Lama"]
        ];
        $randomKey = array_rand($quote);
        $randomQuote = $quote[$randomKey];
    ?>
    <h1 class="center-text white">Générateur de citation</h1>
    <div class="center" style="height: 350px">
        <div class="center" style="background: url('../img/citation.jpg') center no-repeat;background-size: 300%;height: 300px;border-radius: 8px;">
            <div class="card" style="background: rgba(255, 255, 255, 0.4);">
                <h1 class="center-text">
                    <?php
                        echo "<q>" . $randomQuote[0] . "</q>";
                        echo "<span>- " . $randomQuote[1] . "</span>";
                    ?>
                </h1>
            </div>
        </div>
    </div>    
</body>
</html>