$(document).ready(function() {
    $('#clientesID').DataTable( {
        "processing": true,
        "serverSide": true,
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