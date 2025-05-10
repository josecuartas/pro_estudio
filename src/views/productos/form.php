<!-- Page Content -->
<div class="mt-4 container">
    <h2><?php echo $respuesta["form"]["title"]; ?></h2>

    <?php
/*
    echo "<pre>";
    print_r($respuesta);
    die();
    */
?>

    <form action="
        <?php $respuesta["form"]["action"]; ?>"
        method="post" enctype="multipart/form-data">

        <div class="row mb-3">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" class="form-control" id="inputNombre"
                value=
                    "<?php echo $respuesta["form"]["value"]->getNombre(); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-10">
                <input type="text" name="descripcion" class="form-control" id="inputDescripcion"
                value=
                    "<?php echo $respuesta["form"][
                        "value"
                    ]->getDescripcion(); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>
            <div class="col-sm-10">
                <input type="int" name="precio" class="form-control" id="inputPrecio"
                value=
                    "<?php echo $respuesta["form"]["value"]->getPrecio(); ?>">
            </div>
        </div>

        <!--
        <div class="row mb-3">
            <label for="inputFecha" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" name="fecha" class="form-control" id="inputFecha"
                value=
                    "<?php
//echo $respuesta["form"]["value"]->getFecha_alta();
?>">
            </div>
        </div>


        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Categorías</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" name="categoria" type="radio" id="inlineCheckbox1" value="pizza" checked>
                    <label class="form-check-label" for="inlineCheckbox1">Pizzas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="categoria" type="radio" id="inlineCheckbox2" value="bebida">
                    <label class="form-check-label" for="inlineCheckbox2">Bebidas</label>
                </div>
            </div>
        </fieldset>
        -->

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="activo">Estado</label>
            <div class="col-sm-10">
                <select class="form-select" name="estado" id="estado" aria-label="Default select example">
                    <option selected value="1" checked>Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputFkproveedor" class="col-sm-2 col-form-label">Fkproveedor</label>
            <div class="col-sm-10">
                <input type="integer" name="fkproveedor" class="form-control" id="inputFkproveedor"
                value=
                    "<?php echo $respuesta["form"][
                        "value"
                    ]->getFkproveedor(); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="imagen">Imagen</label>
            <div class="col-sm-10">
                <input type="file" name="imagen" id="imagen" accept="image/jpeg,image/png">
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo $respuesta[
            "form"
        ]["button"]; ?></button>
        <button type="button" class="btn btn-primary" onclick="location.href='/productos'">Cancelar</button>

    </form>
</div>
