$(document).ready(function () {


     $.validator.addMethod("letras_espacios", function(value, element) {
    return this.optional(element) ||  /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_.,\s]+$/.test(value);
    }, "No se permiten caracteres especiales");

    $(".btnEnviar").on("click", function(){
        validatorNotificacion= $("#frmNotificacion").validate();
        validatorNotificacion.destroy();
        validatorNotificacion = $("#frmNotificacion").validate({
        event: "blur",
        rules: {
            titulo: {required: true, letras_espacios:true ,rangelength: [1,20]},
            mensaje: {required: true, letras_espacios:true ,rangelength: [1,40]}
            
        },
        messages: {
            titulo: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"},
            mensaje: {required: "Requerido",letras_espacios:"No se permiten caracteres especiales" ,rangelength: "Máximo {1} caracteres"}
           
        },
        submitHandler: function (form)
        { 
            $.ajax({
                type: 'POST',
                "url": "index.php?controller=NOTIFICACION&action=send_notification",
                data: {'message': $("#mensaje").val(),'title': $("#titulo").val()},
                beforeSend: function()
                {
                 $('.mensajes').html('Procesando...');
                },
                success: function (data)
                {
                   var TipoA=jQuery.parseJSON(data);
                   
                    if(TipoA.message == false)
                    {
                      swal({
                            type: 'error',
                            html: $('<div>¡Error!</div>'),
                            confirmButtonText: 'Error...',
                            confirmButtonColor: "#85d630",
                            timer: 1400
                        });
                    }
                    else
                    {
                   
                        swal({
                                  type: 'success',
                                  html: $('<div>Agregado</div>'),
                                  confirmButtonText: 'Agregado...',
                                  confirmButtonColor: "#85d630",
                                  timer: 1200
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


