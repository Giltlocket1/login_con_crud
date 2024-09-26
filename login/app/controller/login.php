<?php
session_start();

// print_r($_SESSION['usuario']);

if (isset($_SESSION['usuario'])) {
   /*  header("location: /.index.php"); */ //control shift y a para documentar rapido.
} 
if ($_POST) {
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    if (empty($_SESSION['registro'])) {
            echo json_encode([0,"Datos de accecso correctos"]); 
            // echo "<script>alert('Contraseña o correo incorrectos');</script>";
        } else {
            if ($email == $_SESSION['registro']['email'] && $pass == $_SESSION['registro']['pass']) {
                $_SESSION['usuario'] = $_SESSION['registro'];
                echo json_encode([1,"Datos de accecso correctos"]); 
                // header("location: index.php");
            } else {
                echo json_encode([0,"Datos de accecso INcorrectos"]); 
                // echo "<script>alert('Contraseña o correo incorrectos');</script>";
            }
        }
    } else {
        echo json_encode([0,"Datos de accecso incorrectos"]); 
        //echo "<script>alert('No puedes dejar campos vacios');</script>";
        // echo json_encode([0, "Pasword erroneo!"]); //resúesta por parte del sercidor y impresion de datos.
    }
}

?>