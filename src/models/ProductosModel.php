<?php
//namespace App\Models;
class ProductosModel extends EntityModel
{
    protected $table = "productos";
    protected $alias = "p";

    private ?int $id = null;
    private string $nombre = "";
    private string $descripcion = "";
    private ?int $precio = null;
    private $imagen;
    private string $fecha_alta;
    private string $estado;
    private $fkproveedor;

    /*
    Cardinalidades:
        ManyToMany < -- Devolver un array
        ManyToOne < -- Devolver un solo objeto
        OneToMany < -- Devolver un array
        OneToOne < -- Devolver un objeto
    */

    /**
     * @ManyToMany(targetEntity=CategoriasModel,joinTable=categorizacion,joinColumn=fkcategoria,inversedJoinColumn=fkproducto)
     */
    private $categorias;

    /*
     * @ManyToOne(targetEntity=ProveedoresModel,inverseJoinColumn=fkproveedor)
     */
    private $proveedor;

    public function getTable()
    {
        return $this->table;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setFecha_alta($fecha_alta)
    {
        $this->fecha_alta = $fecha_alta;
    }

    public function getFecha_alta()
    {
        return $this->fecha_alta;
    }

    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }

    public function getCategorias()
    {
        return $this->categorias;
    }

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setFkproveedor($fkproveedor)
    {
        $this->fkproveedor = $fkproveedor;
    }

    public function getFkproveedor()
    {
        return $this->fkproveedor;
    }
}
