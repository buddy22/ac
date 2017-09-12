

$(document).ready(function(){
    
 /*$('.redireccion').on('click', function () {

    var str = $(this).text();
    var ruta = str.replace(" ","");
    var url="view/grilla"+ruta+".php";

    $.post(url,{},function(data){
        $("#contenido").html(data);
     }); 

   }); */

 $('.redireccion').on('click', function () {
    var ruta = $(this).data('ruta');
    var url="view/grilla"+ruta+".php";

    $.post(url,{},function(data){
        $("#contenido").html(data);
     }); 
    
   });  
});