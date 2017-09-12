

function listar() {
    var table = $('#tablaProducto').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "index.php?controller=PRODUCTO" + "&action=getAll",
        },
        "columns": [
            {"data": "codigoProducto", "class": "hidden"},
            {"data": "codigoTipoProducto", "class": "hidden"},
            {"data": "codigoEstado", "class": "hidden"},
            {"data": "nombre", "class": ""},
            {"data": "descripcion", "class": ""},
            {"data": "precio", "class": ""},
            {"data": "nombreTipoProducto", "class": ""},
            {"data": "estado", "class": ""},
            {"data":null,"defaultContent": "<button class ='btn btn-primary btn-xs editarProducto'>Editar</button>\n\
                                <button class ='btn btn-danger disa btn-xs'  id='borrarProducto'>Eliminar</button>\n\
                                <button data-toggle='modal' href='#ventanaImagen' class ='btn btn-primary imagenProducto btn-xs' >Imagen</button>"}
        ],
        "aaSorting": [[1, 'asc'], [2, 'asc']],
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



function cargarCmbTipoProducto()
{
    $.ajax({
        url: "index.php?controller=TIPOPRODUCTO" + "&action=get",
        success: function (data)
        {
            $(".opcionTipoProducto").remove();
            var TipoA = jQuery.parseJSON(data);
            for (var i in TipoA)
            {
                var $element = $("<option class='opcionTipoProducto'  value=" + TipoA[i].codigoTipoProducto + ">" + TipoA[i].nombre + "</option>");
                $("#cmbTipoProducto").append($element);
            }
        }
    });
}









$("#tablaProducto").on('click', '#borrarProducto', function () {

    var fila = $(this).parents("tr").find("td");

    swal({
        title: "¿Está Seguro?",
        html: $(
                '<label>Eliminar a: &nbsp</label>' + '<label id="lblFactor"></label>' + '<br><br>' +
                '<Button class="btn btn-success" id="borrar">Eliminar</Button>' + '&nbsp&nbsp' +
                '<Button class="btn btn-danger" id="cancelar">Cancelar</Button>'
                ),
        showConfirmButton: false,
        allowOutsideClick: false
    }).then(
            $("#cancelar").click(function (event) {
        swal.close();
    })).then(
            $("#borrar").click(function (event) {
    }, function () {

        $.ajax({
            type: 'POST',
            url: "index.php?controller=PRODUCTO" + "&action=delete",
            data: {
                'codigoProducto': fila[0].innerText
            },
            success: function (data) {
                var TipoA = jQuery.parseJSON(data);
                if (TipoA == true)
                {
                    swal({
                        type: 'success',
                        html: $('<div>Eliminado</div>'),
                        confirmButtonText: 'Eliminado...',
                        confirmButtonColor: "#85d630",
                        timer: 1200
                    });

                    listar();

                } else
                {
                    swal({
                        type: 'error',
                        html: $('<div>¡Error!</div>'),
                        confirmButtonText: 'Error...',
                        confirmButtonColor: "#85d630",
                        timer: 1400
                    });
                }
            }
        });
    }));

    $("#lblFactor").html(fila[3].innerText);
});

function limpiarCampos() {
    $('#cmbTipoProducto').val(0);
    $('#nombre').val("");
    $('#descripcion').val("");
    $('#precio').val("");
    $('#estado').val(0);
}
$(document).ready(function () {
    
    //validatorProducto = $("#frmProducto").validate();
   
    $.validator.addMethod("letras_espacios", function(value, element) {
    return this.optional(element) ||  /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_.,\s]+$/.test(value);
    }, "No se permiten caracteres especiales");

    cargarCmbTipoProducto();
    $("#modificarProducto").hide();
    listar();
    
    
    $('#agregarProducto').on('click', function () {
        
    validatorProducto = $("#frmProducto").validate();
    validatorProducto.destroy();
    validatorProducto = $("#frmProducto").validate({
        event: "blur",
        rules: {
            nombre: {required: true, letras_espacios:true ,rangelength: [1,30]},
            descripcion: {required: true, letras_espacios:true ,rangelength: [1,255]},
            precio: {required: true, number: true },
            estado: {min: 1},
            cmbTipoProducto: {min: 1}
            
        },
        messages: {
            nombre: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"},
            descripcion: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"},
            precio: {required: "Requerido",number: "Digite un precio válido"},
            estado: "Elija",
            cmbTipoProducto: "Elija"
        },
        submitHandler: function (form)
        { 
    
            $.ajax({
                type: 'POST',
                url: "index.php?controller=PRODUCTO" + "&action=insert",
                data: {
                    'tipoProducto': $('#cmbTipoProducto').val(),
                    'nombre': $("#nombre").val(),
                    'descripcion': $("#descripcion").val(),
                    'precio': $("#precio").val(),
                    'estado': $("#estado").val()
                },
                success: function (data)
                {
                    
                    var TipoA = jQuery.parseJSON(data);
                    if (TipoA == false)
                    {
                        swal({
                            type: 'error',
                            html: $('<div>¡Ya tiene datos asignados!</div>'),
                            confirmButtonText: 'Error...',
                            confirmButtonColor: "#85d630",
                            timer: 1200
                        });
                    } else
                    {
                        swal({
                            type: 'success',
                            html: $('<div>Guardado</div>'),
                            confirmButtonText: 'Guardando...',
                            confirmButtonColor: "#85d630",
                            timer: 1200
                        });
                        listar();
                        limpiarCampos();
                    }
                }
            });
        }
    });
});
    
    
    $('#modificarProducto').on('click', function () {
    
   validatorProducto = $("#frmProducto").validate({
        event: "blur",
        rules: {
            nombre: {required: true, letras_espacios:true ,rangelength: [1,30]},
            descripcion: {required: true, letras_espacios:true ,rangelength: [1,255]},
            precio: {required: true, number: true },
            estado: {min: 1},
            cmbTipoProducto: {min: 1}
            
        },
        messages: {
            nombre: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"},
            descripcion: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"},
            precio: {required: "Requerido",number: "Digite un precio válido"},
            estado: "Elija",
            cmbTipoProducto: "Elija"
        },
        submitHandler: function (form)
        { 
            $.ajax({
                type: 'POST',
                url: "index.php?controller=PRODUCTO" + "&action=update",
                data: {
                    'codigoProducto': $("#codigoProducto").val(),
                    'tipoProducto': $("#cmbTipoProducto").val(),
                    'nombre': $("#nombre").val(),
                    'descripcion': $("#descripcion").val(),
                    'precio': $("#precio").val(),
                    'estado': $("#estado").val()
                },
                success: function (data)
                {

                    var TipoA = jQuery.parseJSON(data);
                    if (TipoA == true)
                    {
                        swal({
                            type: 'success',
                            html: $('<div>Editado</div>'),
                            confirmButtonText: 'Editando...',
                            confirmButtonColor: "#85d630",
                            timer: 1200
                        });
                        listar();
                        $("#modificarProducto").hide();
                        $("#agregarProducto").show();
                        limpiarCampos();
                    } else
                    {
                        swal({
                            type: 'error',
                            html: $('<div>¡Error</div>'),
                            confirmButtonText: 'Error...',
                            confirmButtonColor: "#85d630",
                            timer: 1200
                        });
                    }
                }
            });
        }
    });
});
    
    $('#tablaProducto').on('click', '.editarProducto', function () {
    
    validatorProducto = $("#frmProducto").validate();
    validatorProducto.destroy();
    $("#modificarProducto").show();
    $("#agregarProducto").hide();
    limpiarCampos();
    $(".disa").attr("disabled","disabled");

    var fila = $(this).parents("tr").find("td");

    $("#codigoProducto").val(fila[0].innerText);
    $('#cmbTipoProducto').val(fila[1].innerText);
    $('#estado').val(fila[2].innerText);
    $('#nombre').val(fila[3].innerText);
    $('#descripcion').val(fila[4].innerText);
    $('#precio').val(fila[5].innerText);
});
    
});
