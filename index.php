<?php
$weather = file_get_contents('text.json');
$data = json_decode($weather, true);
?>

<html lang="ru">
<meta charset="UTF-8">
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

 <h1>Погода в <?= $data['name'] ?></h1>
 <p><?= date('d / m / Y') ?></p>
 <img src="<?= 'https://openweathermap.org/img/w/' . $data['weather'][0]['icon'] . '.png' ?>" alt="">

<table >
   <tr>
    <td>Рассвет</td>
    <td><?= date('H:i', $data['sys']['sunrise']) ?></td>
   </tr>
   <tr>
    <td>Заход</td>
    <td><?= date('H:i', $data['sys']['sunset']) ?></td>
  </tr>
  <tr>
    <td>Температура</td>
    <td><?=$data['main']['temp'] . ' °C' ?></td>
   </tr>
   <tr>
    <td>Температура минимальная</td>
    <td><?=$data['main']['temp_min'] . ' °C' ?></td>
  </tr>
  <tr>
    <td>Температура максимальная</td>
    <td><?=$data['main']['temp_max'] . ' °C' ?></td>
   </tr>
   <tr>
    <td>Скорость ветра</td>
    <td><?=$data['wind']['speed'] . ' m/s'?></td>
  </tr>
  <tr>
    <td>Влажность</td>
    <td><?=$data['main']['humidity'] . '%' ?></td>
   </tr>
   <tr>
    <td>Давление</td>
    <td><?=$data['main']['pressure'] ?></td>
  </tr>
 <tr>
    <td>Облачность</td>
    <td><?=$data['weather'][0]['description'] ?></td>
  </tr>
</table>