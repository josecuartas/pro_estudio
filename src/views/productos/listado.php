<!-- Page Content -->
<div class="mt-4 container">
    <h2>Listado de productos</h2>
    <a class="btn btn-primary" aria-current="page" href="/productos/new">Alta producto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Fecha alta</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuesta["form"]["productos"] as $p): ?>
                <tr>
                    <td><?php echo $p->getId(); ?></td>
                    <td><?php echo $p->getNombre(); ?></td>
                    <td><?php echo $p->getFechaAlta(); ?></td>
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
