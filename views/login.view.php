<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="index.php?opcion=login" method="post">
        <div class="container w-25 mt-5">
            <div class="mb-3">
                <h1 class="text-bg-dark w-100 text-center mx-auto p-2 rounded-2 mb-4">Login</h1>
                <label for="" class="form-label fw-bold">usuario</label>
                <input type="text" class="form-control " name="usuario" id="" aria-describedby="helpId" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">contraseña</label>
                <input type="password" class="form-control " name="pass" id="" aria-describedby="helpId" />
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-dark w-100 mt-3" name="login" value="Entrar">
            </div>
        </div>
    </form>
</body>

</html>