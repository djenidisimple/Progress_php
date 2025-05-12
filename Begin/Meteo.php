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
        $temp = $result->hourly->temperature_2m[0] . "°C ";
        $source = $result->hourly->time[0];
        $date = new DateTime($source);
        $date = $date->format('D d M Y H:m:s');
        $time_zone = $result->timezone;
    ?>
    <div class="center">
        <div class="card center-text">
            <h2><?= $temp;?></h2>
            <h3><?= $date . " " . $time_zone;?></h3>
            <br>
            <select name="city" style="width: 100%;height: 30px;">
                <option value="Antananarivo">Antananarivo</option>
            </select>
        </div>
    </div>
</body>
</html>