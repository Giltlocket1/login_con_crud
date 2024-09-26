const registro_datos = () => {
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("pass").value;

    let data = new FormData();
    data.append("nombre", nombre);
    data.append("apellido", apellido);
    data.append("email", email);
    data.append("pass", password);

    fetch("app/controller/registro.php", { 
        method: "POST", 
        body: data
    })
    .then(respuesta => respuesta.json()) 
    .then(respuesta => {
        if(respuesta[0] == 1) {
            alert(respuesta[1]);
            window.location = "login.php"; // Redirige al login después del registro exitoso
        } else {
            alert(respuesta[1]); // Muestra el mensaje de error
        }
    });
}

// Agrega un listener al botón para registrar los datos
document.getElementById("registro").addEventListener("click", registro_datos);
