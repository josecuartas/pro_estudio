<?php
class Clase
{
    public $booleana = null;
    public function funcion()
    {
        echo "<pre>En función: <br>";
        print_r($this->booleana);
        echo "</pre> <hr>";
    }
}

$instancia = new Clase();
$instancia->funcion();
echo "Fuera de función: <br>";
//print_r($instancia->booleana);
echo $instancia->booleana ?? "falso";
