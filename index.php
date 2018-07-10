
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Погода</title>
    <style>
    table {
        width: 350px; 
        background: white; 
        color: white; 
        border-spacing: 1px; 
       }
    td, th {
        background: blue;
        padding: 5px; 
       }
    </style>
</head>
<body>
<?php
$link = 'http://api.openweathermap.org/data/2.5/weather';
$apiKey = '07ef72dff62524c380873e16e72a2a45';
$city = 'Sevastopol';
$units = 'metric';
$apiURL = "{$link}?q={$city}&units={$units}&appid={$apiKey}";


$weather = file_get_contents($apiURL) or exit('Не удалось получить данные');

$data = json_decode($weather, true);
if ($data === null) {
    exit('Ошибка декодирования json');
}
?>

 <h1>Погода в <?php echo (!empty($data['name'])) ? $data['name'] : 'не удалось получить название города' ; ?></h1>
 <p><?= date('d / m / Y') ?></p>
 <img src="<?= (!empty('https://openweathermap.org/img/w/' . $data['weather'][0]['icon'] . '.png')) ? 'https://openweathermap.org/img/w/' . $data['weather'][0]['icon'] . '.png' : 'Иконка не указана' ?>" alt="">

<table >
   <tr>
    <td>Рассвет</td>
    <td><?= (!empty($data['sys']['sunrise'])) ? date("H:i\\", $data['sys']['sunrise']) : 'Время рассвета не указано' ?></td>
   </tr>
   <tr>
    <td>Заход</td>
    <td><?= (!empty($data['sys']['sunset'])) ? date("H:i\\", $data['sys']['sunset']) : 'Время заката не указано' ?></td>
  </tr>
  <tr>
    <td>Температура</td>
    <td><?= (!empty($data['main']['temp'] . ' °C')) ? $data['main']['temp']. ' °C' : 'Температура не указана' ?></td>
   </tr>
   <tr>
    <td>Температура минимальная</td>
    <td><?= (!empty($data['main']['temp_min'] . ' °C')) ? $data['main']['temp_min'] . ' °C' : 'Минимальная температура не указана' ?></td>
  </tr>
  <tr>
    <td>Температура максимальная</td>
    <td><?= (!empty($data['main']['temp_max'] . ' °C')) ? $data['main']['temp_max'] . ' °C' : 'Максимальная температура не указана' ?></td>
   </tr>
   <tr>
    <td>Скорость ветра</td>
    <td><?= (!empty($data['wind']['speed'] . ' m/s')) ? $data['wind']['speed'] . ' m/s' : 'Скорость ветра не указана'?></td>
  </tr>
  <tr>
    <td>Влажность</td>
    <td><?= (!empty($data['main']['humidity'] . '%')) ? $data['main']['humidity'] . '%' : 'Влажность не указана' ?></td>
   </tr>
   <tr>
    <td>Давление</td>
    <td><?= (!empty($data['main']['pressure'])) ? $data['main']['pressure'] : 'Давление не указано' ?></td>
  </tr>
 <tr>
    <td>Облачность</td>
    <td><?= (!empty($data['weather'][0]['description'])) ? $data['weather'][0]['description'] : 'Облачность не указана' ?></td>
  </tr>
</table>
</body>
</html>
