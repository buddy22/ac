
 
$(document).ready(function () {
    
    $("#SalirSistema").on("click",function ()
    {
        $.ajax({
                type: 'POST',
                "url": "index.php?controller=Login&action=logout",
                success: function (data)
                {
                    $("body").html(data);
                }
            });
    });
   
    $("#enviar").on("click",function (e)
    {
       e.preventDefault();
        $.ajax({
                type: 'POST',
                "url": "index.php?controller=Login&action=verificarlogin",
                data: {'Usuario': $("#user").val(), "password":$("#pass").val()},
                success: function (data)
                {
                    //alert(data);
                    $("body").html(data);
                }
            });
    });
    
    $("#error").css("display", "none");

    document.formularioContacto.Usuario.focus();

    document.formularioContacto.addEventListener('submit', validarFormulario);


//Validacion de tecla espacio para el label
    function errorUsuarioPassword() {
        $("#error").css("display", "block");
        $("#error").val("Usuario o password erroneo");
        $("#error").css("color", "red");
        $('#enviar').attr("disabled", true);
    }
    $("#user").keypress(function (e) {
        if (e.which == 32) {
            $("#user").attr('style', 'background:#FF4A4A');
            $("#error").css("display", "block");
            $("#error").html("No se permite espacios vacios");
            $("#error").css("color", "red");
            $('#enviar').attr("disabled", true);

        } else {
            $('#enviar').attr("disabled", false);
            $("#user").attr('style', 'background:#fff');
        }
    });

//Validacion para quitar los espacios
    $("#pass").focus(function () {
        $("#error").css("display", "none");
        str = $("#user").val();
        str = str.replace(/\s/g, '');
        $("#user").val(str);

    });


//Bloquear click derecho. 
    document.oncontextmenu = function ()
    {
        return false;
    }

function validarFormulario(evObject) {
    evObject.preventDefault();
    
    var formulario = document.formularioContacto;
    
        formulario.submit();
    
}

});



function fallo() {
    $("#error").html("Usuario o Contraseña erronea.");
    $("#error").css("display", "block");
    $("#error").css("color", "red");
}

