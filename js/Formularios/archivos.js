
//Metodos para las imagenes 
//guarda imagenes en el server
$('#submit_form_imagen').on('submit', function (e) {
        e.preventDefault();
        if ($('#image_file').val() !== '')
        {
          var fileExtension = ['png', 'jpeg', 'jpg', 'gif'];
            if ($.inArray($('#image_file').val().split('.').pop().toLowerCase(), fileExtension) >= 0)
            {
                if ($("#image_file").prop("files")[0].size <= 104857600)
                {
                  $('#btnImg').attr("disabled", true);
                    $.ajax({
                            xhr: function () {
                                var xhr = new window.XMLHttpRequest();
                                $(".progressM").show();
                                xhr.upload.addEventListener("progress", function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        percentComplete = Math.round(percentComplete * 100);

                                        $("#profressBarM").attr('aria-valuenow', percentComplete).css('width', percentComplete + '%').text(percentComplete + '%');

                                        if (percentComplete === 100)
                                        {
                                            $("#profressBarM").attr('aria-valuenow', 0).css('width', 0 + '%').text(0 + '%');
                                            $(".progressM").hide();
                                            $('#btnImg').attr('disabled', false);
                                        }
                                    }
                                });
                                return xhr;
                            },
                            type: 'POST',
                            url: "index.php?controller=IMAGE" + "&action=uploadImage",
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                if (data == 1)
                                {
                                    $('#image_file').val('');
                                    $('#btnImg').attr("disabled", false);
                                    swal({
                                        type: 'success',
                                        html: $('<div>Guardado</div>'),
                                        confirmButtonText: 'Guardando...',
                                        confirmButtonColor: "#85d630",
                                        timer: 1200});
                                    getAllimages();
                                }
                                else
                                {
                                    swal({
                                        type: 'error',
                                        html: data,
                                        confirmButtonText: 'Error...',
                                        confirmButtonColor: "#85d630",
                                        timer: 1200});
                                }
                            }
                        });
                    
                } 
                else
                {
                    swal({
                        type: 'error',
                        html: $('<div>¡El tamaño excede el limite permitido!</div>'),
                        confirmButtonText: 'Error...',
                        confirmButtonColor: "#85d630",
                        timer: 1200});
                }
            }
            else
            {
                swal({
                    type: 'error',
                    html: $('<div>¡El formato es invalido!</div>'),
                    confirmButtonText: 'Error...',
                    confirmButtonColor: "#85d630",
                    timer: 1200});
            }

        } 
        else
        {
            swal({
                type: 'error',
                html: $('<div>¡Seleccione una imagen!</div>'),
                confirmButtonText: 'Error...',
                confirmButtonColor: "#85d630",
                timer: 1200});

        }
    });


//obtiene la imagenes del server 
function getAllimages()
{
    $.ajax({
        type: 'POST',
        url: "index.php?controller=IMAGE" + "&action=getAllimages",
        data: {'co': $("#codigoI").val()},
        success: function (data) {
            deleteimages();
            var images = jQuery.parseJSON(data);
            var cant = 0;
            for (var i in images)
            {
                cant++;
                var $element = $('<li class="deleteimage"><span ><img src="' + images[i].ruta + '"/><span id="remove_button" onmouseup="deleteGMSimage(\'' + images[i].ruta  + '\',\'' + images[i].codigoImagen + '\')" class="deleteGMSimage btn fa fa-trash"></span></span></li>');
                $(".galeria").append($element);
            }
            $("#canImg").text('Cantidad de imágenes: ' + cant);
        }
    });
}
//limpia el html cada vez que carga la imagenes 
function  deleteimages() {
    $(".deleteimage").remove();
}
//elimana una imagen del server 
function deleteGMSimage(pathImg,coImg) {
    $(".deleteGMSimage").click(function () {
        $("#lblBorrar").html(pathImg);//Pasa el valor del nombre del Geologo al sweetalert. 
    }), swal({
        title: "¿Está Seguro?",
        html: $('<label>Eliminar a: &nbsp</label>' + '<label id="lblBorrar"></label>' + '<br><br>' +
                '<Button class="btn btn-success" id="borrar">Eliminar</Button>' + '&nbsp&nbsp' +
                '<Button class="btn btn-danger" id="cancelar">Cancelar</Button>'),
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
            url: "index.php?controller=IMAGE" + "&action=deleteImage",
            data: {path: pathImg, coPath: coImg},
            success: function (data) {
                if (data == 1)
                {
                    swal({
                        type: 'success',
                        html: $('<div>Eliminado</div>'),
                        confirmButtonText: 'Eliminando...',
                        confirmButtonColor: "#85d630",
                        timer: 1200});
                    getAllimages();
                } else {
                    swal({
                        type: 'error',
                        html: $('<div>¡Registro relacionado \n\ a un Punto de documentación!</div>'),
                        confirmButtonText: 'Error...',
                        confirmButtonColor: "#85d630",
                        timer: 1400});
                }
            }
        });
    }));
};

$("#tablaProducto").on('click','.imagenProducto',function (e)
{
        var fila = $(this).parents("tr").find("td");
        $('#image_file').val('');

        $("#codigohojaI").val(fila[3].innerText);
        $("#codigoI").val(fila[0].innerText);//Pasa el valor al formulario modal al input type="hidden" para que el ajax lo maneje.

        $(".progressM").hide();

        getAllimages();
});
