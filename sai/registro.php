<?php
try {
    $dsn = "mysql:host=192.168.20.20;dbname=edutechnia";
    $dbh = new PDO($dsn, 'edutech', 'S3c+3dut3c..');
    $dbh->exec('set names utf8');
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Prepare
// $stmt = $dbh->prepare("INSERT INTO Clientes (nombre, ciudad) VALUES (?, ?)");
// $stmt = $dbh->prepare('INSERT INTO empleados (nombre, email, celular, empresa, mensaje ) VALUES (:nombre, :email, :celular, :empresa, :mensaje )');
$stmt = $dbh->prepare('INSERT INTO registro (nombre, email, celular, empresa, mensaje ) VALUES (?,?,?,?,?)');
// Bind
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$empresa = $_POST['empresa'];
$mensaje = $_POST['mensaje'];
$stmt->bindParam(1, $nombre);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $celular);
$stmt->bindParam(4, $empresa);
$stmt->bindParam(5, $mensaje);
// Excecute
if ($nombre === "" || $email === "" || $celular === "") {
    echo ('error');
} else {
    echo ($nombre . ' - gracias por registrarse');
    $stmt->execute();
}
$dbh = null;
