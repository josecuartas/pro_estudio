<?php
//namespace App\Models;
class CategoriasModel extends EntityModel
{
    private $lalala;
    protected $table = "categorias";
    protected $alias = "c";

    private int $id;
    private string $categoria = "";

    /**
     * @ManyToMany(targetEntity=CategoriasModel,
     joinTable=categorizacion,joinColumn=fkcategory,
     inverseJoinColumn=fkproducto)
     */
    //private $atributo;

    public function getTable()
    {
        return $this->table;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getName()
    {
        return $this->categoria;
    }
}
