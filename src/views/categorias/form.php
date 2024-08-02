<!-- Page Content -->
<div class="mt-4 container">
    <h2><?php echo $respuesta["form"]["title"]; ?></h2>
    <form action="" method="post">

        <div class="row mb-3">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="categoria" class="form-control" id="inputNombre"
                    value="<?php echo $respuesta["form"][
                        "registro"
                    ]->getCategoria(); ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo $respuesta[
            "form"
        ]["button"]; ?></button>
        <button type="button" class="btn btn-primary" onclick="location.href='/categorias'">Cancelar</button>

    </form>
</div>
