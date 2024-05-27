<?php

use function PHPSTORM_META\type;

include "Conexion.php";

class Auth extends Conexion
{
    public function registrar($user, $password)
    {
        $dbh = parent::conectar();
        $sql = "INSERT INTO t_usuarios(id_user,user,password) VALUES (null,?,?)";
        $stmt = $dbh->prepare($sql);
        // Bind
        $stmt->bindParam(1, $user);
        $stmt->bindParam(2, $password);
        // Excecute
        return $stmt->execute();
    }

    public function logear($user, $password)
    {
        $dbh = parent::conectar();
        $passwordExistente = "";
        $sql = "SELECT * FROM t_usuarios WHERE user='$user'";

        // $stmt = $dbh->query($sql);

        $stmt = $dbh->prepare($sql);
        // $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $st = $stmt->execute();

        $row = $stmt->fetch();

        if ($row) {
            $passwordExistente = $row['password'];
        }

        if (password_verify($password, $passwordExistente)) {
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            return true;
        } else {
            return false;
        }
    }
}
