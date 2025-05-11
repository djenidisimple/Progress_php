<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meteo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $api = "https://api.open-meteo.com/v1/forecast?latitude=-21.4527&longitude=47.0857&hourly=temperature_2m";
        $open_url = file_get_contents($api);
        $result  = json_decode($open_url);
        echo $result->hourly->temperature_2m[0] . "°C " . $result->hourly->time[0] . " Timezone : " . $result->timezone;
    ?>
</body>
</html>