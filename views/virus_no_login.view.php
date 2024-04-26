<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>virus</title>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center mt-5">
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
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- (isset($virus_array) && !$virus_array) -->
        <?php else : ?>
            <div class="col-md-8">
                <h1 class="text-center">No hay virus</h1>
            </div>
        <?php endif ?>
        <!-- ----- -->
    </div>
</body>

</html>