<?php
require 'db.php';
$data = $_POST;
?>

<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <title>Будь здоров</title>
  </head>

<?php
$person = $_SESSION['logged_user']->name;
if( isset($_SESSION['logged_user']) ) : ?>
<div class="intro" style="font-size:18px; font-weight:600; border:2px solid #06f; background-color: #FAEBD7;">
Привет, <?php echo $person; ?>!
</div>
<br>
<button type="submit" class="btn btn-danger" onclick="window.location.href = 'logout.php';">Выйти</button>
<div class="menu" style="width: 850px; height: 900px; border:2px solid #06f; padding: 5px; margin:auto; background-color: #FAEBD7;">
    <div class="float-left" style="width: 250px;">
        <h1>Записаться на приём</h1>
        <form action="" method="POST">
            <p>
            <p><strong>Выберите дату</strong></p>
            <input type="date" name="date"> < - -
            </p>
            <p>
            <p><strong>Специальность</strong></p>
            <input type="text" name="type">
            </p>
            <p><b>Свободные места</b></p>
            <button type="submit" class="btn btn-info" name="do_show">Показать</button>
            <button type="submit" class="btn btn-warning" name="my_doc">Мои записи</button><br><br>
            <!-- <p><strong>ФИО врача</strong></p>
            <input type="text" name="docName">
            </p> -->
            <!-- <button type="submit" class="btn btn-success" name="do_doc">Записаться</button>
            <button type="submit" class="btn btn-danger" name="do_cancel">Отменить</button> -->
   </div>
    <div class="float-right" style="width: 550px;">
    
    <?php
    if( isset($data['do_show']) ){
    $type = $data['type'];
    $date = $data['date'];
    $doctors = R::findAll('doctor', "specialty = :specialty", [':specialty' => $type]);
    $app1 = R::findAll('app', "data_app = :data_app", [':data_app' => $date]);
      foreach( $doctors as $key => $doc){
        $i = 5;
        foreach( $app1 as $key => $calcul){
          if ( ($doc->name == $calcul->doctor) && ($calcul->data_app == $date)){
            $i = $i-1;
          }
      // $array[] = $doc->name;
        }
        if ($i > 0){
        echo "<input type='radio' name='docName' value='" . $doc->name ."'><b> ФИО:</b> " . $doc->name . ". Осталось номерков: <b>" . "$i" . "</b><br>" ;
        }
      }
       echo "<button type='submit' class='btn btn-success' name='do_doc'>Записаться</button>";
  }

  

  if( isset($data['do_doc']) ){
    $app = R::dispense('app');
    $app->data_app = $data['date'];;
    $app->doctor = $data['docName'];
    $app->user = $person;
    if ( $app->doctor == NULL ){
      echo '<div style="color: red;">Выберите врача!</div><hr>';
    }
    else{
    R::store($app);
    }
  }

  if( isset($data['my_doc']) ){
    $app1 = R::findAll('app', "user = :user", [':user' => $person]);
      foreach( $app1 as $key => $myApp){
        echo "Вы записаны к <b>" . $myApp->doctor . "</b> на <b>" . $myApp->data_app . "</b><br>" ;
        }
        echo "<input type='text' name='docName'><button type='submit' class='btn btn-danger' name='do_cancel'>Отменить</button>";
        
      }
  

  if( isset($data['do_cancel']) ){
    // echo date("d/m/Y");
    $today = date("Y-m-d");
    $value2 = $data['docName'];
    $value = $data['date'];
    // echo $today . "<hr>";
    // echo $data['date'];
    if ($data['date'] == $today){
      echo "Нельзя отменить запись позднее 1 дня до приёма!";
    }
    else {
      $bean = R::findOne( 'app', 'data_app = ? AND doctor = ? AND user = ? ', [
        $value,
        [$value2, PDO::PARAM_STR],
        [$person, PDO::PARAM_STR]
        ]);
      $delete = R::load('app', $bean->id);
      R::trash($delete);
      echo "Вы отменили приём к врачу!";
    }
    
  }
    ?>
    </div>
</div>

<?php else : ?>
    <body>
    <div class="float-right" style="width: 300px;" >
    <button type="submit" class="btn btn-primary" onclick="window.location.href = 'signup.php';">Регистрация</button>
    <button type="submit" class="btn btn-info" onclick="window.location.href = 'login.php';">Авторизация</button>
    </div>
    <div class="list" style="width: 600px;  border:2px solid #06f; padding: 5px;">
        <h1>Список специалистов</h1>
            <?php
            $doctors = R::findCollection('doctor', 'ORDER BY `specialty` ASC');
            while ( $doctor = $doctors->next()){
              echo "<b>Специальность:</b> " . $doctor->specialty. " <b>| ФИО:</b> " . $doctor->name . '<br>';
            }
            ?>
    </div>
    </body>
</html>
<?php endif; ?>
