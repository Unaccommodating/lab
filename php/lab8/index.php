<?php
error_reporting(0);
$json = file_get_contents("main.json");
$array = json_decode($json, true);

session_start();
$arrGif = scandir('gif');
$array_gif = array();

for($i = 0; $i < count($arrGif); $i++)
{
    if(trim($arrGif[$i]) != '.' && trim($arrGif[$i]) != '..' )
    {
    $array_gif[]= $arrGif[$i];
    }
}

$perem = $array_gif[array_rand($array_gif)];
$number = $perem - ".gif";
if ($number == 1){
    $array["1"]['view'] += 1;
}
if ($number == 2){
    $array["2"]['view'] += 1;
}
if ($number == 3){
    $array["3"]['view'] += 1;
}
if ($number == 4){
    $array["4"]['view'] += 1;
}
if ($number == 5){
    $array["5"]['view'] += 1;
}
echo '<a href="0'.$number.'.php"><img src="gif/'.$perem.'"></a>';
$array['AllView'] += 1;
$jsonNew = json_encode($array);  
    $file = fopen('main.json','w+');
    fwrite($file, $jsonNew);
    fclose($file);


// if($write) { $info = '<br>Ваш вход засчитан!'; }
// echo 'Всего перезагрузок : <span style="color:red;">'.$counter.'</span>' . $info;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>практика</title>
</head>
  <body>
  <p> <b> взгялните на вашу <a href="statistic.php">статистику</a> </b> ( Яндекс.Метрика и Google Analitics отдыхают ) </p>
  </body>
</html>