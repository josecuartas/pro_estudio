<?php

class ProveedoresModel extends EntityModel
{
    protected $table = "proveedores";
    protected $alias = "p";

    private int $id;
    private string $proveedor;
    private int $fkcontacto;

    public function getId()
    {
        return $this->id;
    }

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }

    public function setFkcontacto($fkcontacto)
    {
        $this->fkcontacto = $fkcontacto;
    }

    public function getFkcontacto()
    {
        return $this->fkcontacto;
    }
}
