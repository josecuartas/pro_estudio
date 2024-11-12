<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
include "src/utils/config.php";
include "src/utils/autoload.php";
ini_set("display_errors", 1);
error_reporting(E_ALL);
//if (!is_dir(VIEWS . $entidad)) $entidad = 'productos';
$entidad = $_GET["e"] ?? "productos";
$entidad = ucfirst(strtolower($entidad));
$clase = $entidad . "Controller";
if (!class_exists($clase)) {
    die("No existe la clase --> " . $clase);
}

$accion = $_GET["a"] ?? "list";
if (!method_exists($clase, $accion)) {
    die("No existe el método $accion en la clase $clase");
}

$respuesta = $clase::$accion();
$archivo = $respuesta["view"];

include VIEWS . "/inc/header.php";
include VIEWS . "$archivo";
include VIEWS . "/inc/footer.php";
