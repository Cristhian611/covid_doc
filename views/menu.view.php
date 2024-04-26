<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>menu</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ">
            <ul class="nav navbar-nav">
                <?php if ($logeado): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?opcion=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?opcion=contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?opcion=paciente">Paciente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?opcion=virus">Virus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?opcion=contagio">Contagio</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?opcion=home">Home</a>
                </li>

                <div class="dropdown ">
                    <button class="btn btn-dark dropdown-toggle text-white-50 " type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Usuario
                    </button>
                    <ul class="dropdown-menu text-bg-dark ">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?opcion=login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?opcion=registro">Registro</a>
                        </li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="index.php?opcion=virus">Virus</a>
                </li>
                <?php endif; ?>
            </ul>
            <div class="ms-auto">
                <a href="#" class="bg-white border-0 fw-bold text-dark p-2 rounded-1 text-decoration-none"
                    name="comprobar" value="perfil">
                    <?= $usuario ?>
                </a>
                <?php if ($logeado): ?>
                <a href="index.php?opcion=login&accion=salir" type="submit" name="comprobar" value="salir"
                    class="btn p-1 border-0 text-white rounded-1" style="background-color: #ff0000;">Salir</a>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <!-- BOOTSTRAP JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>