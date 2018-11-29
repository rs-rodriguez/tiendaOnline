$(document).ready(function() {
    $('#clientesID').DataTable( {
        "ajax": {
            "url": '../core/rest/viewListarClientes.php',
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "direccion" },
            { "data": "telefono" },
            { "data": "edad" }
        ]
    } );
} );