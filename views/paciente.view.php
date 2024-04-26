<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paciente</title>
</head>

<body>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!-- ---- form ---- -->
                <!-- alta -->
                <div class="card card-body text-center">
                    <h4 class="mb-4">Alta Paciente</h4>
                    <form action="index.php?opcion=paciente&accion=crear" method="POST">
                        <input type="number" name="codigo" class="form-control mb-3" placeholder="Código" autofocus required>
                        <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required></input>
                        <input type="number" name="edad" class="form-control mb-3" placeholder="Edad" min=1 required>
                        <input type="submit" class="btn btn-success w-100" name="crear" value="Alta">
                    </form>
                </div>
                <!-- ---- -->

                <!-- modificar -->

                <?php if (isset($modificar) && $modificar) : ?>
                    <div class="card card-body text-center mt-5">
                        <h4 class="mb-4">Modificar Paciente (<?= $paciente_a_modificar[0]['nombre'] ?>)</h4>
                        <form action="index.php?opcion=paciente&accion=modificar&codigo=<?= $paciente_a_modificar[0]['codigo'] ?>" method="POST">
                            <input type="text" name="nombre" class="form-control mb-3" placeholder="<?= $paciente_a_modificar[0]['nombre'] ?>" required></input>
                            <input type="number" name="edad" class="form-control mb-3" placeholder="<?= $paciente_a_modificar[0]['edad'] ?>" min=1 required>
                            <input type="submit" class="btn btn-success w-100" name="modificar" value="Modificar">
                        </form>
                    </div>
                <?php endif; ?>
                <!-- ---- -->


            </div>
            <!-- tabla paciente -->
            <?php if (isset($pacientes) && $pacientes) : ?>
                <div class="col-md-8">
                    <h4 class="mb-3">Todos los pacientes</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($pacientes as $paciente) : ?>
                                <tr>
                                    <td>
                                        <?= $paciente['codigo'] ?>
                                    </td>
                                    <td>
                                        <?= $paciente['nombre'] ?>
                                    </td>
                                    <td>
                                        <?= $paciente['edad'] ?>
                                    </td>
                                    <td>
                                        <!-- <a href="index.php?opcion=paciente&accion=ver_alumnos&codigo=<?= $paciente['codigo'] ?>" class="btn btn-warning">
                                            Alumnos
                                        </a> -->
                                        <a href="index.php?opcion=paciente&accion=modificar&codigo=<?= $paciente['codigo'] ?>" class="btn btn-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="index.php?opcion=paciente&accion=eliminar&codigo=<?= $paciente['codigo'] ?>" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- (isset($pacientes) && !$pacientes) -->
            <?php else : ?>
                <div class="col-md-8">
                    <h1>No hay Pacientes</h1>
                </div>
            <?php endif ?>
            <!-- ----- -->
        </div>
    </div>
</body>

</html>