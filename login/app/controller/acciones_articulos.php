<?php
session_start();

// Inicializar la lista de artículos si aún no existe en la sesión
if (!isset($_SESSION['articulos'])) {
    $_SESSION['articulos'] = [];
}

// Procesar las acciones: agregar, eliminar, editar
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'agregar':
            $nombre = htmlspecialchars($_POST['nombre']);
            $precio = htmlspecialchars($_POST['precio']);
            $_SESSION['articulos'][] = ['nombre' => $nombre, 'precio' => $precio];
            break;

        case 'eliminar':
            $indice = (int)$_POST['indice'];
            if (isset($_SESSION['articulos'][$indice])) {
                unset($_SESSION['articulos'][$indice]);
                $_SESSION['articulos'] = array_values($_SESSION['articulos']); // Reindexar el array
            }
            break;

        case 'editar':
            $indice = (int)$_POST['indice'];
            $nuevoNombre = htmlspecialchars($_POST['nombre']);
            $nuevoPrecio = htmlspecialchars($_POST['precio']);
            if (isset($_SESSION['articulos'][$indice])) {
                $_SESSION['articulos'][$indice] = ['nombre' => $nuevoNombre, 'precio' => $nuevoPrecio];
            }
            break;
    }
}

// Devolver la lista actualizada de artículos en formato JSON
echo json_encode($_SESSION['articulos']);
?>
