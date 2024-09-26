<?php 
require_once "./app/config/dependencias.php";
session_start();

// print_r($_SESSION['usuario']);

if (isset($_SESSION['usuario'])) {
   /*  header("location: /.index.php"); */ //control shift y a para documentar rapido.
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=JS."bootstrap.bundle.min.js";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <link rel="stylesheet" href="<?=CSS."login.css";?>">
    <title>Formulario de datos</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center">
    <form action="./login.php" method="post" class="w-25 p-4">
        <div class="text-center mb-5 c-user">
        <i class="bi bi-browser-firefox "></i>
        </div>
        <div class="input-group mt-3">
        <i class="bi bi-person-fill input-group-text fs-3"></i>
            <input type="text" class="form-control" placeholder="Ingrese su email" id="email" name="email" value="<?= (!empty($_POST['email'])) ? $_POST['email'] : ''; ?>">
        </div>
        <div class="input-group mt-3">
        <i class="bi bi-eye-fill input-group-text fs-3"></i>
            <input type="text" class="form-control" placeholder="Ingrese su contraseña" id="pass" name="pass" value="<?= (!empty($_POST['pass'])) ? $_POST['pass'] : ''; ?>">
        </div>
        <div class="mt-5 c-button">
        <button id="btn_saludar" type="button" class="btn btn-success w-100">Ingresar</button>
        </div>
        <div class="mt-4 d-flex justify-content-center">
            <a href="./registro_vista.php" class="text-white mx-3">Crear una cuenta</a>
        </div>
        
    </form>
    <script src="./public/js/main.js"></script>
</body>
</html>