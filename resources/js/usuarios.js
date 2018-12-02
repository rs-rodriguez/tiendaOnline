$(document).ready(function() {
    $('#clientesID').DataTable( {
        "ajax": {
            "url": '../core/rest/viewUsers.php',
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "direccion" },
            { "data": "telefono" },
            { "data": "edad" }
        ],
        "aoColumnDefs": [
           {
                "aTargets": [6],
                "mData": "id",
                "mRender": function (data, type, full) {
                    return '<button href="#"' + 'id="'+ data + '">Edit</button>';
                }
            }
         ]
    } );
} );