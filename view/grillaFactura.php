<script src="js/Formularios/factura.js" type="text/javascript"></script>


<div class="table-responsive col-sm-12">
    <caption><h2 class="text-center">Facturas</h2></caption>
    <table cellspacing="0" width="100%" class="table table-bordered table-hover"   id="tablaEncabezado" >
        <thead>
            <tr>
                <th>CodigoCompra</th>
                <th>Numero Compra</th>
                <th>Nombre Cliente</th>
                <th>Fecha Compra</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

<label for="mensajes" class="mensajes"></label>

<div class="tablaDetalles table-responsive">
    <table id="tablaDetalles" class="table table-bordered">
            
        <caption id="encabezado"></caption>
        <thead>
            <tr>
                <th>nombre</th>
                <th>cantidad</th>
                <th>precio</th>
                <th>subTotal</th>
            </tr>
        </thead >
        <tbody>
        </tbody>
    </table>
</div>
