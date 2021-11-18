<?php

require './assets/php/db.php';

unset($_SESSION['user']);

header('Location: ./signin.php');

?>