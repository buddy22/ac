/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    $("#modificarTipoProducto").hide();
    listar();
    
     $.validator.addMethod("letras_espacios", function(value, element) {
    return this.optional(element) ||  /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_.,\s]+$/.test(value);
    }, "No se permiten caracteres especiales");

    $(".agregarTipoProducto").on("click", function(){
        validatorTipoProducto= $("#frmTipoProducto").validate();
        validatorTipoProducto.destroy();
        validatorTipoProducto = $("#frmTipoProducto").validate({
        event: "blur",
        rules: {
            nombre: {required: true, letras_espacios:true ,rangelength: [1,30]}
            
        },
        messages: {
            nombre: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"}
           
        },
        submitHandler: function (form)
        { 
            $.ajax({
                type: 'POST',
                "url": "index.php?controller=TIPOPRODUCTO&action=insert",
                data: {'nombre': $("#nombre").val()},
                beforeSend: function()
                {
                 $('.mensajes').html('Procesando...');
                },
                success: function (data)
                {
                   
                    swal({
                              type: 'success',
                              html: $('<div>Agregado</div>'),
                              confirmButtonText: 'Agregado...',
                              confirmButtonColor: "#85d630",
                              timer: 1200
                         });
                    listar();
                },
                complete : function() 
                {
                $('.mensajes').html('');
                }
            });
        }
        });
    });

    $("#tablaTipoProducto").on("click",".btnEliminarTipoProducto", function(){
        var fila= $(this).parents("tr").find("td");

        swal({
                title: "¿Está Seguro?",
                html: $(
                        '<label>Eliminar a: &nbsp</label>' + '<label id="lblTipoProducto"></label>' + '<br><br>' +
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
                    url: "index.php?controller=TIPOPRODUCTO" + "&action=delete",
                    data: {'codigoTipoProducto': fila[0].innerText},
                    beforeSend: function()
                    {
                     $('.mensajes').html('Procesando...');
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
                    },
                    complete : function() 
                    {
                    $('.mensajes').html('');
                    }
                });
            }));
        $("#lblTipoProducto").html(fila[1].innerText);
    });
    
    
    $("#tablaTipoProducto").on("click",".btnEditarTipoProducto", function(){
        validatorTipoProducto= $("#frmTipoProducto").validate();
        validatorTipoProducto.destroy();
        fila= $(this).parents("tr").find("td");
        $("#nombre").val(fila[1].innerText);
        $("#agregarTipoProducto").hide();
        $("#modificarTipoProducto").show();
        $(".btnEliminarTipoProducto").attr("disabled","disabled");
    });

    $(".modificarTipoProducto").on("click", function(){
        
        validatorTipoProducto = $("#frmTipoProducto").validate({
        event: "blur",
        rules: {
            nombre: {required: true, letras_espacios:true ,rangelength: [1,30]}
            
        },
        messages: {
            nombre: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"}
           
        },
        submitHandler: function (form)
        { 
                $.ajax({
                    type: 'POST',
                    url: "index.php?controller=TIPOPRODUCTO" + "&action=update",
                    data: {'codigo': fila[0].innerText,'nombre':$('#nombre').val()},
                    beforeSend: function()
                    {
                     $('.mensajes').html('Procesando...');
                    },
                    success: function (data) 
                    {
                        
                        var TipoA = jQuery.parseJSON(data);
                        if (TipoA == true)
                        {
                            swal
                            ({
                                type: 'success',
                                html: $('<div>Editado</div>'),
                                confirmButtonText: 'Editando...',
                                confirmButtonColor: "#85d630",
                                timer: 1200
                            });
                            listar();
                            $("#nombre").val("");
                            $("#agregarTipoProducto").show();
                            $("#modificarTipoProducto").hide();

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
                    },
                    complete : function() 
                    {
                    $('.mensajes').html('');
                    }
                });
            }
        });
    });
    

});

function listar(){
   
    var table = $('#tablaTipoProducto').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "index.php?controller=TIPOPRODUCTO&action=getAll"
        },
        "columns": [
            {"data": "codigoTipoProducto", "class": "hidden"},
            {"data": "nombre", "class": ""},
            {"data":null,"defaultContent": "<button class ='btnEditarTipoProducto btn btn-primary'>Editar</button>\n\
                                <button class ='btnEliminarTipoProducto btn btn-danger'>Eliminar</button>"}
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



