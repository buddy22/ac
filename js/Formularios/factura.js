$(document).ready(function (){
    $("#tablaDetalles").hide();
    listar();
    
  //SELECCIONAR ENCABEZADO PARA LISTAR DETALLES
$("#tablaEncabezado").on('click','.btnDetalles', function(){

    $("#tablaDetalles").show();
    filaEncabezado = $(this).parents("tr").find("td");
    $("#encabezado").html('<h3><b>Número de Factura: '+filaEncabezado[1].innerText+'</b></h3>');
    //cargarTablaModulos(fila[0].innerText);
    $(".mensajes").focus();
    cargarTabla(filaEncabezado[1].innerText);
    
});





   
   
});



function listar(){
    
    var table = $('#tablaEncabezado').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "index.php?controller=FACTURA&action=getAlLEncabezado"
        },
        "columns": [
            
            {"data": "CodigoCompra", "class": "hidden"},
            {"data": "numeroCompra", "class": ""},
            {"data": "NombreCompleto", "class": ""},
            {"data": "FechaCompra", "class": ""},
            {"data": "Total", "class": ""},
            {"data":null,"defaultContent": "<button class ='btnDetalles btn btn-primary'>DETALLES</button>"}
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
        }
    });
}

//CARGAR TABLA DE MODULOS POR PUNTO DE DOCUMENTACION
function cargarTabla(codigo)
{
    
    limpiarTabla();

    $.ajax({
        type: 'POST',
        "url": "index.php?controller=FACTURA&action=getAlLDetalles",
        data: {'codigo': codigo},
        beforeSend: function()
        {
         $('.mensajes').html('Procesando...');
        },
        success: function (data)
        {
            var TipoA = jQuery.parseJSON(data);

            if(TipoA == false)
            {

            }
            else
            {
                for (var i in TipoA)
                {
                   
                      var $element = $("<tr class='filaModulo'><td class='ocultarColumna'>" + TipoA[i].codigoDetalle + "</td><td class='ocultarColumna'>" + TipoA[i].codigoProducto + "</td><td><b>" + TipoA[i].nombre + "</b></td><td><b>" + TipoA[i].cantidad + "</b></td><td><b>" + TipoA[i].precio + "</b></td><td><b>" + TipoA[i].subTotal + "</b></td></tr>");                      
                   

                    $("#tablaDetalles").append($element);

                    ocultarColumna();
                }
            }
        },
        complete : function() 
        {
        $('.mensajes').html('');
        }
    });
}


function ocultarColumna()
{
    $(".ocultarColumna").hide();
}

function limpiarTabla()
{
    $(".filaModulo").remove();
}
