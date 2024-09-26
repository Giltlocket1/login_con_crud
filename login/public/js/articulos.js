document.addEventListener('DOMContentLoaded', function() {
    const formArticulo = document.getElementById('formArticulo');
    const listaArticulos = document.getElementById('listaArticulos');

    // Función para actualizar la lista de artículos
    function actualizarLista(articulos) {
        listaArticulos.innerHTML = '';
        articulos.forEach((articulo, indice) => {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
            li.innerHTML = `
                ${articulo.nombre} - $${articulo.precio}
                <div>
                    <button class="btn btn-warning btn-sm" onclick="editarArticulo(${indice})">Editar</button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarArticulo(${indice})">Eliminar</button>
                </div>
            `;
            listaArticulos.appendChild(li);
        });
    }

    // Función para enviar datos al servidor usando fetch
    async function enviarDatos(data) {
        const response = await fetch('app/controller/acciones_articulos.php', {
            method: 'POST',
            body: data
        });
        const articulos = await response.json();
        actualizarLista(articulos);
    }

    // Evento del formulario de artículos
    formArticulo.addEventListener('submit', function(e) {
        e.preventDefault();
        const data = new FormData(formArticulo);
        data.append('accion', 'agregar');
        enviarDatos(data);
        formArticulo.reset();
    });

    // Función para eliminar un artículo
    window.eliminarArticulo = function(indice) {
        const data = new FormData();
        data.append('accion', 'eliminar');
        data.append('indice', indice);
        enviarDatos(data);
    }

    // Función para editar un artículo
    window.editarArticulo = function(indice) {
        const nuevoNombre = prompt('Nuevo nombre del artículo:');
        const nuevoPrecio = prompt('Nuevo precio del artículo:');
        if (nuevoNombre && nuevoPrecio) {
            const data = new FormData();
            data.append('accion', 'editar');
            data.append('indice', indice);
            data.append('nombre', nuevoNombre);
            data.append('precio', nuevoPrecio);
            enviarDatos(data);
        }
    }
});
