<?php
session_start();
require_once("./app/config/dependencias.php");
require_once("./app/controller/inicio.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=CSS."inicio.css";?>">
    <title>Formulario de datos</title>
</head>
<body class="vh-100">
    <div class="container mt-5">
        <h1 class="text-center fs-3">Bienvenido Usuario</h1>
        
        <!-- Información del usuario -->
        <table class="table table-striped table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Campo</th>
                    <th scope="col">Información</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Nombre</td>
                    <td><?= $_SESSION['registro']['nombre']; ?></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Apellido</td>
                    <td><?= $_SESSION['registro']['apellido']; ?></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Email</td>
                    <td><?= $_SESSION['registro']['email']; ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Formulario para agregar artículos -->
        <form id="formArticulo" class="mt-5">
            <div class="mb-3">
                <label for="nombre" class="form-label">Artículo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del artículo">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio del artículo">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Artículo</button>
        </form>

        <!-- Lista de artículos -->
        <h2 class="mt-5">Artículos Registrados</h2>
        <ul id="listaArticulos" class="list-group"></ul>

        <!-- Botón para cerrar sesión -->
        <div class="d-flex justify-content-center mt-3">
            <a href="cerrar_sesion.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
        </div>
    </div>

    <script src="<?=JS."articulos.js";?>"></script>
</body>
</html>
