<?php
session_start();

// Inicializar la lista de productos si aún no existe en la sesión
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Función para manejar acciones de productos
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $producto = htmlspecialchars($_POST['producto'] ?? '');
    $precio = htmlspecialchars($_POST['precio'] ?? '');

    switch ($accion) {
        case 'agregar':
            // Añadir el producto a la lista
            $_SESSION['productos'][] = ['nombre' => $producto, 'precio' => $precio];
            break;
        case 'eliminar':
            $indice = (int)$_POST['indice'];
            if (isset($_SESSION['productos'][$indice])) {
                unset($_SESSION['productos'][$indice]);
                $_SESSION['productos'] = array_values($_SESSION['productos']); // Reindexar
            }
            break;
        case 'actualizar':
            $indice = (int)$_POST['indice'];
            if (isset($_SESSION['productos'][$indice])) {
                $_SESSION['productos'][$indice]['nombre'] = $producto;
                $_SESSION['productos'][$indice]['precio'] = $precio;
            }
            break;
    }

    // Devolver la lista de productos en formato JSON
    echo json_encode($_SESSION['productos']);
    exit();
}
?>
