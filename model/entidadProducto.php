<?php

class entidadProducto extends EntidadBase {

    private $vcodigoProducto = 0;
    private $vNombre = "";
    private $vDescripcion= "";
    private $vPrecio = 0;
    private $vEstado="";
    private $vTipoProducto=0;

    Public function __construct() {
        parent::__construct();
    }
    function getVcodigoProducto() {
        return $this->vcodigoProducto;
    }

    function getVNombre() {
        return $this->vNombre;
    }

    function getVDescripcion() {
        return $this->vDescripcion;
    }

    function getVPrecio() {
        return $this->vPrecio;
    }

    function getVEstado() {
        return $this->vEstado;
    }

    function getVTipoProducto() {
        return $this->vTipoProducto;
    }

    function setVcodigoProducto($vcodigoProducto) {
        $this->vcodigoProducto = $vcodigoProducto;
    }

    function setVNombre($vNombre) {
        $this->vNombre = $vNombre;
    }

    function setVDescripcion($vDescripcion) {
        $this->vDescripcion = $vDescripcion;
    }

    function setVPrecio($vPrecio) {
        $this->vPrecio = $vPrecio;
    }

    function setVEstado($vEstado) {
        $this->vEstado = $vEstado;
    }

    function setVTipoProducto($vTipoProducto) {
        $this->vTipoProducto = $vTipoProducto;
    }
    
    function getArray($accion) {
         
        if ($accion == 1) 
        {
            return array
            (
               "tipoProducto" => $this->vTipoProducto,
               "nombre" => $this->vNombre,
               "descripcion" => $this->vDescripcion,
               "precio" => $this->vPrecio,
               "estado" => $this->vEstado
            );
        } 
        elseif ($accion == 2) 
        {
            return array
            (
               "codigoProducto" => $this->vcodigoProducto,
               "tipoProducto" => $this->vTipoProducto,
               "nombre" => $this->vNombre,
               "descripcion" => $this->vDescripcion,
               "precio" => $this->vPrecio,
               "estado" => $this->vEstado,
               
            );
        }
        elseif ($accion == 3) 
        {
            return array
            (
                "codigoProducto" => $this->vcodigoProducto
            );
        }
        elseif ($accion == 4) 
        {
            return array
            (
                "TipoProducto" => $this->vTipoProducto
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