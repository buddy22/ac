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
    
  });
