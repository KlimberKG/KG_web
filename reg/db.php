<?php

require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=klimberkg',
'root', 'root' ); //for both mysql or mariaDB
session_start();
?>