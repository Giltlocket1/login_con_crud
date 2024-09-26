const enviar_datos = () => {
    let email = document.getElementById("email").value;
    let password = document.getElementById("pass").value;
    let data = new FormData();//formulario de datos
    data.append("email",email);
    data.append("pass", password);
    //append para añadir elementos
    //añadimos lo que mandemos por append llegara a vistaDatos.php
    fetch("app/controller/login.php", { //como es una funcion ponemos parentesis // lugar a donde vamos a mandar la funcion o buscar la funcion.
        method: "POST", //Enviaremos datos por metodo POST.
        body: data
    }).then(respuesta => respuesta.json())//resive los datos del servidor y lo transforma en archivo .json para poderlo leer
        .then(respuesta => { //accede a los datos y los procesa como queramos verlos en vista,imprimirlos etc
            if(respuesta[0] ==1 ){
                alert(respuesta[1]);
                window.location="index.php";
            }else{
                alert(respuesta[1]);
            }
        }
    )
}
 document.getElementById("btn_saludar").addEventListener("click",() =>{
    enviar_datos();
 })

//URL apunta a un dominio un hostin,servidor local, es una direccion externa. protocolos de seguridad,nombre y dominio servidor remoto. puedes acceder desde cualquier lugar que tenga internet.
//URI es una direccion interna desde el mismo proyecto  ejemplo:<link rel="stylesheet" href="<?=CSS."inicio.css";?>">
// para saber si es una URI direcciona solo a carpetas interrnas y para una URL nececita https.
//URL: Direccion externa,direccion publica URI; Direccion interna direccion privada.

//fetch es una funcion permite envio y resepcion de datos por protocolo http y https.
//php devulve una respuesta del servidor, fetch siempre enviara alguna respuesta