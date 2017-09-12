<?php

class entidadDetalle extends EntidadBase {

    private $vCodigoDetalle = 0;
    private $vNumeroCompra=0;
    private $vCodigoProducto = 0;
    private $vCantidad=0;
    private $vSubTotal=0;

    Public function __construct() {
        parent::__construct();
    }
    function getVCodigoDetalle() {
        return $this->vCodigoDetalle;
    }

    function getVNumeroCompra() {
        return $this->vNumeroCompra;
    }

    function getVCodigoProducto() {
        return $this->vCodigoProducto;
    }

    function getVCantidad() {
        return $this->vCantidad;
    }

    function getVSubTotal() {
        return $this->vSubTotal;
    }

    function setVCodigoDetalle($vCodigoDetalle) {
        $this->vCodigoDetalle = $vCodigoDetalle;
    }

    function setVNumeroCompra($vNumeroCompra) {
        $this->vNumeroCompra = $vNumeroCompra;
    }

    function setVCodigoProducto($vCodigoProducto) {
        $this->vCodigoProducto = $vCodigoProducto;
    }

    function setVCantidad($vCantidad) {
        $this->vCantidad = $vCantidad;
    }

    function setVSubTotal($vSubTotal) {
        $this->vSubTotal = $vSubTotal;
    }

    
    function getArray($accion) {
         
        if ($accion == 1) 
        {
            return array
            (
               "numeroCompra" => $this->vNumeroCompra,
               "codigoProducto" => $this->vCodigoProducto,
               "cantidad" => $this->vCantidad,
               "subtotal" => $this->vSubTotal
            );
        } 
        elseif ($accion == 2) 
        {
            return array
            (
               "codigoDetalle" => $this->vCodigoDetalle,
               "numeroCompra" => $this->vNumeroCompra,
               "codigoProducto" => $this->vCodigoProducto,
               "cantidad" => $this->vCantidad,
               "subtotal" => $this->vSubTotal
            );
        }
        elseif ($accion == 3) 
        {
            return array
            (
               "codigoDetalle" => $this->vCodigoDetalle,
               "numeroCompra" => $this->vNumeroCompra
            );
        }
        elseif ($accion == 4) 
        {
            return array
            (
               "numeroCompra" => $this->vNumeroCompra
            );
        }
        
    }
   
 /*   public function save($sP) {

        $query = "CALL $sP('" . $this->vCD02DETENF . "');";
        $save = $this->db()->query($query);
        $this->CloseConexion();
        return $save;
    }

    public function update($sP) {

        $query ="CALL $sP('" . $this->vCD09CODENF . "','" . $this->vCD02DETENF . "');";
        $update = $this->db()->query($query);
        $this->CloseConexion();
        return $update;
    }
    */

}

?>

