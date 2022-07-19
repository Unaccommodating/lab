<?php

// Регистрация
require 'db.php';
$data = $_POST;
if( isset($data['do_signup']) ){
   $errors = array();
   if ( trim($data['name']) == '' ){
     $errors[] = 'Введите ФИО';
   }
   if ( trim($data['email']) == '' ){
    $errors[] = 'Введите E-mail';
  }
  if ( ($data['password']) == '' ){
    $errors[] = 'Введите пароль';
  }
  if ( ($data['password_2']) != $data['password'] ){
    $errors[] = 'Пароли не совпадают';
  }
  if ( R::count('users', "email = ?", array($data['email'])) > 0 ){
      $errors[] = 'Пользователь с таким E-mail уже существует';
  }
  if( empty($errors))
  {
    $user = R::dispense('users');
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    R::store($user);
    echo '<div style="color: green;">Регистрация прошла успешно!</div><hr>';
  } else {
      echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
}

?>
<div class="regLog" style="margin:auto; background-color:#FAEBD7; width:200px; border:2px solid #06f; padding: 5px;">
<form action="signup.php" method="POST">
<p>
<p><strong>ФИО</strong></p>
<input type="text" name="name" pattern="([А-ЯЁ][а-яё]+[\-\s]?){2,}" title="Данное поле должно содержать только кириллицу, пробелы, без цифр и знаков препинания" value="<?php echo @$data['name']; ?>">
</p>
<p>
<p><strong>E-mail</strong></p>
<input type="text" name="email" pattern="([0-9A-Za-z_-]+@[a-z]+\.[a-z]{2,3})" title="E-mail введён неверно" value="<?php echo @$data['email']; ?>">
</p>
<p>
<p><strong>Пароль</strong></p>
<input type="password" name="password" id="password" title="Пароль должен содержать не менее 6 символов английской раскладки">
</p>
<p>
<p><strong>Подтвердите пароль</strong></p>
<input type="password" name="password_2" id="password_2">
</p>
<p>
<button type="submit" name="do_signup" onclick="return Validate()">Зарегестрироватся</button>
</p>
</form>
<button type="submit" onclick="window.location.href = 'login.php';">&#10148;</button>
</div>

<!-- <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password_2").value;
        if (password != password_2) {
            alert("Пароли не совпадают!");
            return false;
        }
        return true;
    }
</script> -->