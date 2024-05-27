<?php
session_start();
include "Auth.php";

$user = $_POST['user'];
$password = $_POST['password'];

$Auth = new Auth();

// $registros = $Auth->logear($user, $password);
// foreach ($registros as $registro) {
//     echo "<pre>";
//     echo $registro->id_user . " ";
//     echo $registro->user . " ";
//     echo $registro->password . "<br>";
//     echo "</pre>";
// }

if ($Auth->logear($user, $password)) {
    header("location:inicio.php");
} else {
    header("location:index.php");
}
