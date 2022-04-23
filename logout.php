<?php

require "reg/db.php";
unset($_SESSION['logged_user']);
header('Location: /index');

?>

