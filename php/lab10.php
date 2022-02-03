<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>10 лаба</title>
</head>
  <body>
      <form name = "form" method = "POST" action = "" enctype="multipart/form-data">
          <p> <b> Откуда </b>  <input type = "text" name = "fromw"> </p>
          <p> <b> Куда </b> <input type = "text" name = "wto"> </p>
          <p> <b> Цена билета </b> <input type = "number" name = "cost"> руб.</p>
          <input type = "submit" name = "submit" value = "Сохранить данные">
          <p> <b>Сортировать по <select name="heading" size="2">
          <option value = "byDest">Пункту назначения</option>
          <option value = "byPrise">Цене</option>
          </select> </b> </p>
          <input type = "submit" name = "submit2" value = "Вывести данные">
      </form>
  </body>
</html>

<?php
// $content = "<style>body{background: #ddeaff;} div {background:white; border:3px solid #fc3; border-radius: 10px; padding:25px; width:250px;} p {font-size:14px; font-weight:normal;}</style>";
// echo $content;
$A = $_POST['fromw'];
$B = $_POST['wto'];
$prise = $_POST['cost'];
$db_host = "localhost"; 
$db_user = "mysql"; 
$db_password = "mysql";
$db_base = "ticket";
$sel = $_POST['heading'];
if($sel === "byDest") {
  $choise = "byDest";
} elseif($sel === "byPrise") {
  $choise = "byPrise";
} 
$link = mysqli_connect($db_host, $db_user, $db_password, $db_base);
if(isset($_POST['submit'])){
$result = $link->query("INSERT INTO `tabl` (`wfrom`, `tow`, `cost`) VALUES ('$A','$B','$prise')");
  echo "Информация занесена в базу данных";
}
else{
	echo "Информация не занесена в базу данных";
}
if(isset($_POST['submit2'])){
  echo "<hr>";
  echo "<div>";
  echo "<span style='color: green;'> Продажа билетов: <br> </span>";
 if($choise == "byPrise"){
    $res = mysqli_query($link, "SELECT * FROM `tabl`");
    while($ResArr = mysqli_fetch_assoc($res))
    {
    $ArrayPrise[] = [$ResArr['cost'], $ResArr['wfrom'], $ResArr['tow']];
    }
    sort($ArrayPrise);
    for($i =0; $i<count($ArrayPrise); $i++)
    {
    echo "<span style='color: red;'>". $ArrayPrise[$i][1]." - <span style='color: blue;'>". $ArrayPrise[$i][2]."</span>" . " <span style='text-decoration: underline; color: black;'>".$ArrayPrise[$i][0]."</span>" . "</span>","<br>";
    }
    echo "</div>";
  }

  if($choise == "byDest"){
    $res = mysqli_query($link, "SELECT * FROM `tabl`");
    while($ResArr = mysqli_fetch_assoc($res))
    {
    $ArrayDest[] = [$ResArr['tow'], $ResArr['wfrom'], $ResArr['cost']];
    }
    sort($ArrayDest);
    for($i =0; $i<count($ArrayDest); $i++)
    {
    echo "<span style='color: red;'>". $ArrayDest[$i][1]." - <span style='color: blue;'>". $ArrayDest[$i][0]."</span>" . " <span style='text-decoration: underline; color: black;'>".$ArrayDest[$i][2]."</span>" . "</span>","<br>";
    }
  }
}

?>