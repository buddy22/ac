<script src="js/Formularios/producto.js" type="text/javascript"></script>
<script src="js/Formularios/archivos.js" type="text/javascript"></script>
<link href="css/css1/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="css/css1/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="css/galeria.css" rel="stylesheet">

<form method="post" id="frmProducto" class="form-inline">
    <input id="codigoProducto" type="hidden">
    <div class="table-responsive">
    	<caption><h2 class="text-center">Registro de Productos</h2></caption>	
        <table class="table ">
            <tbody>
                <tr>
                    <td>
                        <label for="nombre">Nombre: </label>
                        <input id="nombre" name="nombre" type="text" class="form-control">
                    </td>
                    <td>
                        <label for="descripcion">Descripción: </label>
                        <input id="descripcion" name="descripcion" type="text" class="form-control">
                    </td>
                    <td>
                         <label for="precio">Precio: </label>
                         <input id="precio" name="precio" type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="estado">Estado:</label>
                        <select id="estado" name="estado" class="form-control">
                            <option value="0">SELECCIONE</option>
                            <option value="1">Disponible</option>
                            <option value="2">No disponible</option>
                        </select>
                    </td>
                    <td>
                       <label for="cmbTipoProducto">Tipo de Producto:</label>
                        <select id="cmbTipoProducto" name="cmbTipoProducto" class="form-control">
                            <option value="0">SELECCIONE</option>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="Agregar" id="agregarProducto" class="btn btn-success">
                        <input type="submit" value="Guardar" id="modificarProducto" class="btn btn-primary">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</form>  

<div class="table-responsive col-sm-12">	
    <table cellspacing="0" width="100%" class="table table-bordered table-hover"   id="tablaProducto" >
        <thead>
            <tr>
                <th>CodigoPr</th>
                <th>CodigoTipoPr</th>
                <th>CodigoEstado</th>
                <th>Nombre</th>
                <th>Descrpción</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

<div id="ventanaImagen" class="modal fade">      
    <div class="modal-dialog">        
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-body" id="contenidoModal">
              <h2 align="center">Imagen</h2>
                 <form class="form-inline" id="submit_form_imagen">
                        <input id="codigohojaI" name="coho" type="text" class="form-control" required>
                        <input id="codigoI" name="co" type="hidden" class="form-control" >
                        <div class="form-group"> 
                            <input type="file" name="image" id="image_file" accept="image/gif,image/jpeg, image/png,image/jpg" />
                        </div> 
                        <input id="btnImg" type="submit" name="upload_button" class="btn btn-info" value="Subir"/>
                        <div class="progressM" style="width:35%;margin-left:35%;">
                            <div id="profressBarM" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100" style="width:0%; color:black;">
                            0%
                        </div>
                    </div>
                    <div style="width: 100%;display:block;">
                        <ul class="galeria" style="height:260px;width:100%;overflow: auto;" >
                        </ul>   
                    </div>
                     <label id="canImg"></label>
                 </form>
            </div>
        </div>
     </div>
</div>
<style>
    .error{color:red};
</style>