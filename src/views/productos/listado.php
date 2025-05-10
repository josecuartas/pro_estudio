<!-- Page Content -->
<div class="mt-4 container">
    <h2>Listado de productos</h2>
    <a class="btn btn-primary" aria-current="page" href="/productos/new">Alta producto</a>
    <?php if (isset($_GET["error"])) {
        echo "<div class='btn btn-warning'>$_GET[error]</div>";
    } ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Fecha alta</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuesta["productos"] as $p): ?>
                <tr>
                    <td><?php echo $p->getNombre(); ?></td>
                    <td><?php echo $p->getDescripcion(); ?></td>
                    <td><?php echo $p->getPrecio(); ?></td>
                    <td><?php echo $p->getFecha_alta(); ?></td>
                    <td><?php echo $p->getEstado(); ?></td>
                    <!-- <td><img src="productos/pizza.jpg" alt=""></td> -->
                    <td>
                        <a href='/productos/<?php echo $p->getId(); ?>/edit'>Editar</a>
                        <a href="/productos/<?php echo $p->getId(); ?>/delete">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
