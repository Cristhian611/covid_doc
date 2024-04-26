<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contagio</title>
</head>

<body>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!-- ---- form ---- -->
                <!-- alta -->
                <div class="card card-body text-center">
                    <h4 class="mb-4">Alta Contagio</h4>
                    <form action="index.php?opcion=contagio&accion=crear" method="POST">
                        <!-- id -->
                        <input type="number" name="codigo" class="form-control mb-3" placeholder="ID" autofocus required>

                        <!-- paciente -->
                        <label for="" class="form-label fw-bold">paciente</label>
                        <select name="paciente_seleccionado" class="form-select mb-3" required>
                            <?php foreach ($pacientes as $paciente) : ?>
                                <option value="<?= $paciente['codigo'] ?>"><?= $paciente['nombre'] ?> (<?= $paciente['codigo'] ?>)</option>
                            <?php endforeach ?>
                        </select>

                        <!-- virus -->
                        <label for="" class="form-label fw-bold">virus</label>
                        <select name="virus_seleccionado" class="form-select mb-3" required>
                            <?php foreach ($virus_array as $virus) : ?>
                                <option value="<?= $virus['id'] ?>"><?= $virus['tipo'] ?> (<?= $virus['id'] ?>)</option>
                            <?php endforeach ?>
                        </select>

                        <!-- fecha inicio -->
                        <label for="" class="form-label fw-bold">fecha incio</label>
                        <input type="date" name="fecha_inicio" class="form-control mb-3" required></input>

                        <!-- fecha fin -->
                        <label for="" class="form-label fw-bold">fecha final</label>
                        <input type="date" name="fecha_fin" class="form-control mb-4">

                        <input type="submit" class="btn btn-success w-100" name="crear" value="Alta">
                    </form>
                </div>
                <!-- ---- -->

                <!-- modificar -->
                <?php if (isset($modificar) && $modificar) : ?>
                    <div class="card card-body text-center mt-5">
                        <h4 class="mb-4">Modificar contagio (<?= $contagio_a_modificar[0]['id'] ?>)</h4>
                        <form action="index.php?opcion=contagio&accion=modificar&codigo=<?= $contagio_a_modificar[0]['id'] ?>" method="POST">
                            <!-- paciente -->
                            <label for="" class="form-label fw-bold">paciente</label>
                            <select name="paciente_seleccionado" class="form-select mb-3" required>
                                <?php foreach ($pacientes as $paciente) : ?>
                                    <option value="<?= $paciente['codigo'] ?>"><?= $paciente['nombre'] ?> (<?= $paciente['codigo'] ?>)</option>
                                <?php endforeach ?>
                            </select>

                            <!-- virus -->
                            <label for="" class="form-label fw-bold">virus</label>
                            <select name="virus_seleccionado" class="form-select mb-3" required>
                                <?php foreach ($virus_array as $virus) : ?>
                                    <option value="<?= $virus['id'] ?>"><?= $virus['tipo'] ?> (<?= $virus['id'] ?>)</option>
                                <?php endforeach ?>
                            </select>

                            <!-- fecha inicio -->
                            <label for="" class="form-label fw-bold">fecha incio</label>
                            <input type="date" name="fecha_inicio" class="form-control mb-3" required></input>

                            <!-- fecha fin -->
                            <label for="" class="form-label fw-bold">fecha final</label>
                            <input type="date" name="fecha_fin" class="form-control mb-4">
                            <input type="submit" class="btn btn-success w-100" name="modificar" value="Modificar">
                        </form>
                    </div>
                <?php endif; ?>
                <!-- ---- -->


            </div>
            <!-- tabla contagio -->

            <?php if (isset($contagios) && $contagios) : ?>
                <div class="col-md-8">
                    <h4 class="mb-3">Todos los contagios</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Paciente</th>
                                <th>Tipo Virus</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($contagios as $contagio) : ?>
                                <tr>
                                    <td>
                                        <?= $contagio['contagio_id'] ?>
                                    </td>
                                    <td>
                                        <?= $contagio['nombre'] ?> (<?= $contagio['codigo_paciente'] ?>)
                                    </td>
                                    <td>
                                        <?= $contagio['tipo'] ?> (<?= $contagio['id_virus'] ?>)
                                    </td>
                                    <td>
                                        <?= $contagio['fecha_inicio'] ?>
                                    </td>
                                    <td>
                                        <?= $contagio['fecha_fin'] ?? "No finalizado" ?>
                                    </td>
                                    <td>
                                        <!-- <a href="index.php?opcion=contagio&accion=ver_alumnos&codigo=<?= $contagio['contagio_id'] ?>" class="btn btn-warning">
                                            Alumnos
                                        </a> -->
                                        <a href="index.php?opcion=contagio&accion=modificar&codigo=<?= $contagio['contagio_id'] ?>" class="btn btn-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="index.php?opcion=contagio&accion=eliminar&codigo=<?= $contagio['contagio_id'] ?>" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- (isset($contagios) && !$contagios) -->
            <?php else : ?>
                <div class="col-md-8">
                    <h1>No hay contagios</h1>
                </div>
            <?php endif ?>
            <!-- ----- -->
        </div>
    </div>
</body>

</html>