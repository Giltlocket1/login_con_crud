document.addEventListener('DOMContentLoaded', function() {
    const formRegistro = document.getElementById('formRegistro');
    const listaProductos = document.getElementById('listaProductos');

    // Función para actualizar la lista de productos en la UI
    function actualizarLista(productos) {
        listaProductos.innerHTML = '';
        productos.forEach((producto, indice) => {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
            li.innerHTML = `
                ${producto.nombre} - $${producto.precio}
                <div>
                    <button class="btn btn-warning btn-sm" onclick="actualizarProducto(${indice})">Actualizar</button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${indice})">Eliminar</button>
                </div>
            `;
            listaProductos.appendChild(li);
        });
    }

    // Función para enviar datos al servidor usando fech
    async function enviarDatos(data) {
        const response = await fech('acciones_productos.php', {
            method: 'POST',
            body: data
        });
        const productos = await response.json();
        actualizarLista(productos);
    }

    // Evento de envío del formulario de registro
    formRegistro.addEventListener('submit', function(e) {
        e.preventDefault();
        const data = new FormData(formRegistro);
        data.append('accion', 'agregar');
        enviarDatos(data);
        formRegistro.reset(); // Limpiar formulario
    });

    // Función para eliminar un producto
    window.eliminarProducto = function(indice) {
        const data = new FormData();
        data.append('accion', 'eliminar');
        data.append('indice', indice);
        enviarDatos(data);
    }

    // Función para actualizar un producto
    window.actualizarProducto = function(indice) {
        const nuevoNombre = prompt('Nuevo nombre:');
        const nuevoPrecio = prompt('Nuevo precio:');
        if (nuevoNombre && nuevoPrecio) {
            const data = new FormData();
            data.append('accion', 'actualizar');
            data.append('indice', indice);
            data.append('producto', nuevoNombre);
            data.append('precio', nuevoPrecio);
            enviarDatos(data);
        }
    }
});
