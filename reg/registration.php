<?php

require "db.php";

$data = $_POST;
if( isset($data['do_signup']) ){

    // проверка на стандартные ошибки юзера
    $errors = array();
    if( trim($data['login']) == ''){

        $errors[] = "Введите логин!";

    }
    if( trim($data['email']) == ''){

        $errors[] = "Введите почту!";

    }
    if( $data['password'] == ''){

        $errors[] = "Введите пароль!";

    }

    if( $data['password_2'] != $data['password']){

        $errors[] = "Пароли не совпадают!";

    }
// Проверка на уникальность логина и почты
    if(R::count('users', "login = ?", array($data['login'])) > 0){

        $errors[] = "Пользователь с таким логином уже существует!";

    }

    if(R::count('users', "email = ?", array($data['email'])) > 0){

        $errors[] = "Пользователь с такой почтой уже существует!";

    }

    if(empty($errors)){
        // если ошибок нет, то отправка формы, если да, то вывод 1-й ошибки из массива на экран    
    // Создаем таблицу Польз. в бд. и заносим туда данные
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
        // после курсовой обязательно нужно добавить шифрование паролей
        R::store($user);
        echo '<div style="color: green; font-size: 25; text-transform: uppercase; margin-left: 45%;"> Вы успешно зарегистрировалмсь!</div>';
        echo '<script> window.location.href = "http://kg-website/index/"</script>';
    } else{
        echo '<div style="color: red; font-size: 25; text-transform: uppercase; margin-left: 45%;">'.array_shift($errors).'</div>';
    }
}

?>

<link rel="stylesheet" type="text/css" href="style_1.css">
<form class="form_0" action="registration.php" method="POST">

            <h1 title="Форма для регистрации">Регистрация</h1>
            <div class="group">
                <label for="">Имя пользователя:</label>
                <input type="text" name="login" value="<?php echo @$data['login'];?>">
            </div>
            <div class="group">
                <label for="">Пароль:</label>
                <input type="password" name="password" value="<?php echo @$data['password'];?>">
            </div>                
            <div class="group">
                <label for="">Повторить пароль:</label>
                <input type="password" name="password_2" value="<?php echo @$data['password_2'];?>">
            </div>               
            <div class="group">
                <label for="">Адрес электронной почты:</label>
                <input type="email" name="email" value="<?php echo @$data['email'];?>">
            </div>
            <div class="group">
                <button type="submit" name="do_signup">Зарегистрироваться</button>       
            </div>
            
</form>

