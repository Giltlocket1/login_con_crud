<?php
session_start();

if ($_POST) {
    // Verifica que los campos no estén vacíos
    if (
        isset($_POST['nombre']) && !empty($_POST['nombre']) &&
        isset($_POST['apellido']) && !empty($_POST['apellido']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['pass']) && !empty($_POST['pass'])
    ) {
        // Filtrar los datos ingresados
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        // Simular registro guardando en sesión (esto se debería reemplazar con la lógica real de la base de datos)
        $_SESSION['registro'] = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "email" => $email,
            "pass" => $pass // Nota: en un entorno real, usa password_hash() para almacenar contraseñas de forma segura
        ];

        // Respuesta exitosa en JSON
        echo json_encode([1, "Registro exitoso. Redirigiendo al login..."]);
    } else {
        // Respuesta en caso de error (campos vacíos)
        echo json_encode([0, "Todos los campos son obligatorios."]);
    }
}
?>
