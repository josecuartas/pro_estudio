<?php
class Core
{
    protected $controladorActual = "Paginas";
    protected $metodoActual = "index";
    protected $parametros = [];

    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl()
    {
        print_r($_GET);
    }
}
