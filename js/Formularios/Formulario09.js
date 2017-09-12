function GET(param) {
    /* Obtener la url completa */
    url = document.URL;
    /* Buscar a partir del signo de interrogación ? */
    url = String(url.match(/\?+.+/));
    /* limpiar la cadena quitándole el signo ? */
    url = url.replace("?", "");
    /* Crear un array con parametro=valor */
    url = url.split("&");

    /* 
     Recorrer el array url
     obtener el valor y dividirlo en dos partes a través del signo = 
     0 = parametro
     1 = valor
     Si el parámetro existe devolver su valor
     */
    x = 0;
    while (x < url.length)
    {
        p = url[x].split("=");
        if (p[0] == param)
        {
            var x = decodeURIComponent(p[1]);
            return x;
        }
        x++;
    }
}

function Borrar09() {

    $(".Borrar09").click(function () {

        var codigo = $(this).parents("tr").find("td.codigo");
        var nombre = $(this).parents("tr").find("td.nombre");

        var idSeleccionado = codigo[0].innerText;//Set a idSeleccionado el primer idCategoria que encuentra.
        var descripcion = nombre[0].innerText;//Set a descripcion la primera descripcion que encuentra.

        if (confirm("Esta seguro que quiere eliminar: " + descripcion))
        {
            request = $.ajax({
                type: 'POST',
                url: "index.php?controller=CD09ENFERM" + "&action=delete",
                data: {'id': idSeleccionado},
                success: function (data) {
                    if (data == 1)
                    {
                        listarCD09ENFERM();
                        alert("se elimino con exito: " + descripcion);
                    } else
                    {
                        alert("no elimino con exito: " + descripcion);
                    }
                }
            });
        } else
        {
            return false;
        }

    });
};

function Editar_Btn() {
    var codigo;
    var tipoEmfermedad;
    var antetipoEmfermedad;
    
    $(".Editar_Btn").click(function () {
        codigo = $('#codioTipoEnfermedad').val();
        tipoEmfermedad = $('#NombreTipoEnfermead').val();
        antetipoEmfermedad = $('#nombreEnfermedad').val();;
        
        if (confirm("Esta seguro que quiere editar: " + antetipoEmfermedad))
        {
            $.ajax({
                type: 'POST',
                url: "index.php?controller=CD09ENFERM"+"&action=update",
                data: {'Codigo': codigo, 'TipoEmfermedad': antetipoEmfermedad},
                success: function (data)
                {
                    if (data == 1)
                    {
                    alert("se editó con exito: " + tipoEmfermedad);

                    $.post("index.php?controller=" + GET('controller') + "&action=IndexListar", function (datos) {
                        $('#contenido').html(datos);
                    });
                    } else
                    {
                      alert("no editó con exito: " + antetipoEmfermedad);
                    }
                }

            });
        } else
        {
            return false;
        }
    });

}
;

function Agregar_Btn() {
    $(".Agregar_Btn").click(function () {
        var nuevo;
        nuevo = $("#tipoEfrmedad").val();

        $.ajax({
            type: 'POST',
            url: "index.php?controller=CD09ENFERM" + "&action=save",
            data: {'nombreEnfermedad': nuevo},
            success: function (data)
            {
                if (data == 1)
                {
                    alert("se agrego con exito: " + nuevo);

                    $.post("index.php?controller=" + GET('controller') + "&action=IndexListar", function (datos) {
                        $('#contenido').html(datos);
                    });

                } else
                {
                    alert("no agrego con exito: " + nuevo);
                }

            }

        });
    });
}
;

function listarCD09ENFERM() {
    var table = $('#tabla').DataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "index.php?controller=CD09ENFERM" + "&action=getAll"
        },
        "columns": [
            {"data": "CD09CODENF", "class": "hidden codigo"},
            {"data": "CD09DETENF", "class": "nombre"},
            {"defaultContent": "<button data-toggle='modal'  onmouseup='indexEditar()' class='indexEditar btn btn-primary'>Editar</button>\n\
                                <button data-toggle='modal' onmouseup='Borrar09()' id='boton' class='Borrar09 btn btn-danger'>Eliminar</button>"}
        ],
        "aaSorting": [[0, 'desc']],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        dom: 'Bfrtip',
        "buttons": [
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ]
    });
}
function indexAgregar() {
    $(".IndexAgregar").click(function () {
        $.post("index.php?controller=" + GET('controller') + "&action=IndexAgregar", function (datos) {
            $('#contenido').html(datos);
        });
    });
}
function indexEditar() {
    $(".indexEditar").click(function () {
        var codigo = $(this).parents("tr").find("td.codigo");
        var nombre = $(this).parents("tr").find("td.nombre");
        var idSeleccionado = codigo[0].innerText;//Set a idSeleccionado el primer idCategoria que encuentra.
        var descripcion = nombre[0].innerText;//Set a descripcion la primera descripcion que encuentra.
        $.post("index.php?controller=" + GET('controller') + "&action=IndexEditar", function (datos) {
            $('#contenido').html(datos);
            $('#codioTipoEnfermedad').val(idSeleccionado);
            $('#nombreEnfermedad').val(descripcion);
        });
    });
}

$(document).ready(function () {
    listarCD09ENFERM();
    indexAgregar();
});