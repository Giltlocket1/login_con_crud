<?php
require_once("./app/config/dependencias.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS . "bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?= ICONS . "bootstrap-icons.css"; ?>">
    <link rel="stylesheet" href="<?= CSS . "registro_vista.css"; ?>">
    <title>Formulario de Registro</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center">
    <form id="form-registro" class="w-25 p-4">
        <div class="text-center mb-4 c-user">
            <i class="bi bi-cloud-fog2-fill"></i>
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-file-person input-group-text fs-3"></i>
            <input type="text" class="form-control" placeholder="Ingrese su nombre" id="nombre" name="nombre">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-file-person input-group-text fs-3"></i>
            <input type="text" class="form-control" placeholder="Ingrese su apellido" id="apellido" name="apellido">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-gear input-group-text fs-3"></i>
            <input type="email" class="form-control" placeholder="Ingrese su email" id="email" name="email">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-floppy-fill input-group-text fs-3"></i>
            <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pass" name="pass">
        </div>
        <div class="mt-3 c-button">
            <button id="registro" type="button" class="btn btn-success w-100">Registrar</button>
        </div>
    </form>

    <script src="./public/js/registro.js"></script>
</body>
</html>
