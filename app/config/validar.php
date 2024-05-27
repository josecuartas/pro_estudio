<?php


if (!empty($_POST["btn_ingresar"])) {
    echo $_POST["user"];
    echo $_POST["password"];
    // header("Location:../../public/index2.php");

    if (!empty($_POST['user'] and $_POST['password'])) {
        //     include './configurar.php';
        //     $obj = new configurar;
        //     $PDO = $obj->conexion();
        //     $usuario = $_POST['usuario'];
        //     $contrasena = $_POST['contrasena'];
        //     // $consulta = $PDO->query("SELECT * FROM Persons WHERE FirstName='$usuario' and LastName='contrasena'");
        //     $consulta = $PDO->query("SELECT * FROM Persons WHERE FirstName='$usuario'");
        //     if ($resultado = $consulta->fetchObject()) {
        //         header("Location:ingreso.php");
        //         ob_end_flush();
        //     } else {
        //         echo "<div class='container bg-light mt-3 rounded-3 col-3 text-center'>Registro no encontrado</div>";
        //     }
    } else {
        // echo "<div class='container bg-light mt-3 rounded-3 col-3 text-center'>Por favor ingresar datos</div>";
        echo "Por favor ingresar datos";
    }
}
