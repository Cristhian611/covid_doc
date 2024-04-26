<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>virus</title>
</head>

<body>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!-- ---- form ---- -->
                <!-- alta -->
                <div class="card card-body text-center">
                    <h4 class="mb-4">Alta virus</h4>
                    <form action="index.php?opcion=virus&accion=crear" method="POST">
                        <input type="number" name="codigo" class="form-control mb-3" placeholder="ID" autofocus required>
                        <input type="text" name="tipo" class="form-control mb-3" placeholder="tipo" required></input>
                        <input type="number" name="incubacion" class="form-control mb-3" placeholder="incubacion" min=1 required>
                        <input type="submit" class="btn btn-success w-100" name="crear" value="Alta">
                    </form>
                </div>
                <!-- ---- -->

                <!-- modificar -->

                <?php if (isset($modificar) && $modificar) : ?>
                    <div class="card card-body text-center mt-5">
                        <h4 class="mb-4">Modificar virus (<?= $virus_a_modificar[0]['tipo'] ?>)</h4>
                        <form action="index.php?opcion=virus&accion=modificar&codigo=<?= $virus_a_modificar[0]['id'] ?>" method="POST">
                            <input type="text" name="tipo" class="form-control mb-3" placeholder="<?= $virus_a_modificar[0]['tipo'] ?>" required></input>
                            <input type="number" name="incubacion" class="form-control mb-3" placeholder="<?= $virus_a_modificar[0]['incubacion'] ?>" min=1 required>
                            <input type="submit" class="btn btn-success w-100" name="modificar" value="Modificar">
                        </form>
                    </div>
                <?php endif; ?>
                <!-- ---- -->


            </div>
            <!-- tabla virus -->
            <?php if (isset($virus_array) && $virus_array) : ?>
                <div class="col-md-8">
                    <h4 class="mb-3">Todos los virus</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>tipo</th>
                                <th>incubacion (días)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($virus_array as $virus) : ?>
                                <tr>
                                    <td>
                                        <?= $virus['id'] ?>
                                    </td>
                                    <td>
                                        <?= $virus['tipo'] ?>
                                    </td>
                                    <td>
                                        <?= $virus['incubacion'] ?>
                                    </td>
                                    <td>

                                        <a href="index.php?opcion=virus&accion=modificar&codigo=<?= $virus['id'] ?>" class="btn btn-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="index.php?opcion=virus&accion=eliminar&codigo=<?= $virus['id'] ?>" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- (isset($virus_array) && !$virus_array) -->
            <?php else : ?>
                <div class="col-md-8">
                    <h1>No hay virus</h1>
                </div>
            <?php endif ?>
            <!-- ----- -->
        </div>
    </div>
</body>

</html>