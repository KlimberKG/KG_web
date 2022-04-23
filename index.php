<!-- Функционал сайта: 
Данный сайт сделан с целью развить практические навыки web-программирования, сделать почву для курсовой работы и задел на основную работу.

ТЗ:
На главное странице будет:
- кнопка Войти
- кнопка Регистрация
- кнопка выбора проекта:
 1. MOD: Call of Adamant; 
 2. MOD 2: Shadow of Pelagius.

Страница проекта: 
- вкладка Скачать игру 

Поле регистрации:
- Ник пользователя
- Пароль: 
  - от 8 до 16 символов
  - скрыт(дополнение: кнопка "Скрыть/Показать")
  - можно использовать любые символы
  - "Повторить пароль"

Поле входа: 
- Ник пользователя
- Пароль:
 - если неверно, то сообщение об ошибке и просьба проверить данные

-->
<?php

require "reg/db.php";

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
<title>KG</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="script.js"></script>
    </head>
    <body>
         <div id="Back_head">
            <p id="name_company">Kristal Games</p>  
                <div id="head"> 
                    <div class="users_buttons"> 

                        <?php if(isset($_SESSION['logged_user']) ) : ?>
                            <a href="logout.php" target="_self"><button id="login" class="log" title="Выход из аккаунта">Выйти</button></a>   

                        <?php else : ?>
                       <a href="reg/login.php" target="_self"><button id="login" class="log" title="Вход в аккаунт">Войти</button></a>
                       <a href="reg/registration.php" target="_self"><button id="register" class="open" title="Регистрация аккаунта">Регистрация</button></a>
                       <?php endif; ?> 

                    </div>
                    <div class="projects">
                        <a href="Mod_1/project_1.html" target="_self"><button id="MOD1" tabindex="1">Mask of Dead: Call of Adamant</button><br></a>
                        <a href="Mod_2/project_2.html" target="_self"><button id="MOD2" tabindex="2">Mask of Dead 2: Shadow of Pelagius</button></a>
                    </div>
                    <a href="https://google.com" class="donate"><p>Patreon</p></a>
            </div>
         </div>

   <script>
      let reg_start = document.getElementById("register");

       
    </script>
</body>
</html>