<!-- Page Content -->
<div class="mt-4 container">
    <h2><?php echo $respuesta["form"]["title"]; ?></h2>
    <form action="<?php $respuesta["form"][
        "action"
    ]; ?>" method="post" enctype="multipart/form-data">

        <div class="row mb-3">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" class="form-control" id="inputNombre"
                    value="<?php echo isset($respuesta["form"]["value"])
                        ? $respuesta["form"]["value"]->getNombre()
                        : ""; ?>" >
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Categorías</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" name="categoria" type="checkbox" id="inlineCheckbox1" value="pizza">
                    <label class="form-check-label" for="inlineCheckbox1">Pizzas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="categoria" type="checkbox" id="inlineCheckbox2" value="bebida">
                    <label class="form-check-label" for="inlineCheckbox2">Bebidas</label>
                </div>
            </div>
        </fieldset>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="activo">Estado</label>
            <div class="col-sm-10">
                <select class="form-select" name="estado" id="estado" aria-label="Default select example">
                    <option selected value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
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
