<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}
include('src/utils/config.php');
include('src/utils/autoload.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

// use App\Controllers\ProductosController;
// use App\Controllers\CategoriasController;

// Se identifica la entidad definida en el primer parámetro de la url:
// 127.0.0.1/productos (default)
// 127.0.0.1/categorias
$entidad = $_GET['e'] ?? 'productos';
//if (!is_dir(VIEWS . $entidad)) $entidad = 'productos';
$entidad = ucfirst(strtolower($entidad));
$clase = $entidad . 'Controller';
if (!class_exists($clase)) die('No existe la clase --> ' . $clase);

$accion = $_GET['a'] ?? 'list';
if (!method_exists($clase, $accion)) {
    die("No existe el método $accion en la clase $clase");
}

$respuesta = $clase::$accion();
$archivo = $respuesta['view'];
// $archivo = 'listado.php';
// if (in_array($accion, ['alta', 'editar'])) $archivo = 'form.php';

echo "ENTIDAD: " . $entidad . "<br>";
echo "ACCION: " . $accion . "<br>";
echo "RESPUESTA: ";
echo "<pre>";
print_r($respuesta);
echo "</pre>";
echo "<br>";
echo "ARCHIVO: " . $archivo . "<br>";
die();

include(VIEWS . '/inc/header.php');
// include "src/views/$entidad/$archivo";
// include(VIEWS . "$entidad/$archivo");
include(VIEWS . "$archivo");
include(VIEWS . '/inc/footer.php');
