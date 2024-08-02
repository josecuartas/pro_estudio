<!-- Navigation -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top"> -->
<nav class="navbar navbar-expand-lg navbar-light static-top" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../../../public/img/logo-sx-png_secundario.png" alt="..." height="36">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/productos">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/productos">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/categorias">Categorías</a>
                </li>
                <li class="nav-item dropdown">
                    <a style="color:brown" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        echo $_SESSION['user'];
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/logout.php">Salir del sistema</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>