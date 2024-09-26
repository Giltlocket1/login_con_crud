<?php
session_start();// permite trabajar con sesiones
session_unset(); //libera la sesion actual
session_destroy(); //destruye las varuables sesiones

header("location: /paginaWB/login/login.php"); //una vez que mandamos a traer el archivo destuye y nos redirigue a login

?>