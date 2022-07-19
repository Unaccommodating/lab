<?php

// Авторизация
require 'db.php';
$data = $_POST;
if( isset($data['do_login']) )
{
    if ($data['email'] == "admin" && $data['password'] == "WwSsRr") {
        header('Location: http://service/admin.php');
    }
    else{
    $errors = array();
    $user = R::findOne('users', 'email = ?', array($data['email']));
    if( $user )
    {
        if( password_verify($data['password'], $user->password) ){
            $_SESSION['logged_user'] = $user;
            header('Location: /');
        } else
        {
            $errors[] = 'Неверно введён пароль!';
        }
    }else {
        $errors[] = 'Пользователь с таким e-mail не найден!';
    }
    if( ! empty($errors))
  {
      echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
    }
}
?>
<div class="regLog" style="margin:auto; background-color:#FAEBD7; width:200px; border:2px solid #06f; padding: 5px;">
<form action="login.php" method="POST">
<p>
<p><strong>Логин</strong></p>
<input type="text" name="email" value="<?php echo @$data['email']; ?>">
</p>
<p>
<p><strong>Пароль</strong></p>
<input type="password" name="password">
</p>
<button type="submit" name="do_login">Войти</button>
</p>
</form>
</div>