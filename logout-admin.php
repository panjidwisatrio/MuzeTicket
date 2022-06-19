<?php

//kode php disini
session_start();

session_unset();
session_destroy();

setcookie("login", "", time() - 3600);

header('Location: index.php');

?>