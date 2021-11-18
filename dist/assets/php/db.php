<?php 

    require 'assets/libs/rb-mysql.php';

    session_start();

    R::setup('mysql:host=localhost;dbname=memor', 'root', 'root');

    function showErrors($errors) {
        return array_shift($errors);
    }

?>