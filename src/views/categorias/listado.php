<!-- Page Content -->
<div class="mt-4 container">
    <h2>Listado de categorias</h2>
    <a class="btn btn-primary" aria-current="page" href="/categorias/new">Agregar categoría</a>
    <table class="table table-striped">
        <?php if (isset($_GET["error"])) {
            echo "<div class='btn btn-warning'>$_GET[error]</div>";
        } ?>
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($respuesta["categorias"] as $c): ?>
                <tr>
                    <td><?php echo $c->getCategoria(); ?></td>
                    <td>
                        <a href='/categorias/<?php echo $c->getId(); ?>/edit'>Editar</a>
                        <a href='/categorias/<?php echo $c->getId(); ?>/delete'>Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
