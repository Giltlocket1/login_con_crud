<?php 

$email = $_POST['email'];
$pass = $_POST['pass'];
echo json_encode("hola bienvenido tu email es: ".$email ."y tu password es : ".$pass); //convertir respuestas en formato json
//json trabaja con arreglos y objetos 
?>