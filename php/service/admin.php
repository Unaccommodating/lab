<?php

require 'db.php';
echo "Вы вошли в раздел администратора";
$data = $_POST;

if( isset($data['do_admin']) ){
$doctor = R::dispense('doctor');
$doctor->name = $data['name'];
$doctor->specialty = $data['specialty'];
R::store($doctor);
echo '<div style="color: green;">Специалист добавлен!</div><hr>';
}

?>

<form action="admin.php" method="POST">
<p>
<p><strong>ФИО врача</strong></p>
<input type="text" name="name">
</p>
<p>
<p><strong>Специальность</strong></p>
<input type="text" name="specialty">
</p>
<p>
<button type="submit" name="do_admin">Добавить</button>
</p>
</form>
<button type="submit" onclick="window.location.href = 'index.php';">Главная страница</button>

<div class="main">
        <img class='heart' src='Heart-icon.png' width="150px" style="margin-left:400px; margin-top:-170px;">
</div>





<script src="anime.min.js"></script>
   <script>
     var heartBeat = anime ({
       targets: '.heart',
       scale: 1.5,
       duration: 1000,
       autoplay: true,
       loop: true
     })

   </script>