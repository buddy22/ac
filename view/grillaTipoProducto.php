<script src="js/Formularios/tipoProducto.js" type="text/javascript"></script>

<form method="post" id="frmTipoProducto" class="form-inline">
    <h2 class="tituloModal" align="center">Tipo Producto</h2>
    
        <label for="nombre">Nombre:</label>
        <input id="nombre" name="nombre" type="text" class="form-control">
   
    <input type="submit" value="Agregar" id="agregarTipoProducto" class="agregarTipoProducto btn btn-success">
    <input type="submit" value="Guardar" id="modificarTipoProducto" class="modificarTipoProducto btn btn-primary">
</form>  

 <label for="mensajes" class="mensajes"></label>
<div class="table-responsive col-sm-12">	
    <table cellspacing="0" width="100%" class="table table-bordered table-hover"   id="tablaTipoProducto" >
        <thead>
            <tr>
                <th>CodigoTipoPr</th>
                <th>Nombre</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>
<style>
    .error{color:red};
</style>







