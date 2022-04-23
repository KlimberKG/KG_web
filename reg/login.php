<?php

require "db.php";

$data = $_POST;

if(isset($data['do_login'])){
    $errors = array();
    $user = R::findOne('users','login = ?', array($data['login']));

    if( $user ){
        //логин верный
        if( password_verify($data['password'], $user->password) ){
            //пароль верный
            echo '<div style="color: green; font-size: 25; text-transform: uppercase; margin-left: 45%;"> Вы вошли в систему!</div>';
            $_SESSION['logged_user'] = $user;               
        }
         else
        {
            $errors[] = 'Неправильный пароль!' ;
        }
    } 
    else
    {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if( ! empty($errors) ){

        echo '<div style="color: red; font-size: 25; text-transform: uppercase; margin-left: 45%;">'.array_shift($errors).'</div>';

    } 
     
}

?>

<link rel="stylesheet" type="text/css" href="style_1.css">
<form class="form_1" action="login.php" method="POST">

            <h1 title="Форма для авторизации">Авторизация</h1>
            <div class="group">
                <label for="">Имя пользователя:</label>
                <input type="text" name="login" value="<?php echo @$data['login']; ?>">
            </div>
            <div class="group">
                <label >Пароль:</label>
                <input type="password" name="password" value="<?php echo @$data['password']; ?>">
            </div>            
            <div class="group">
                <button type="submit" name="do_login">Войти</button>       
            </div>            
           
</form>

<?php if(isset($_SESSION['logged_user']) ) : ?>
            <script>window.location.href = "http://kg-website/index/";</script>
 <?php endif ?>