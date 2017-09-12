<?php

class entidadTipoProducto extends EntidadBase {

    private $vCodigoTipoProducto = 0;
    private $vNombre = "";

    Public function __construct() {
        parent::__construct();
    }
    function getVCodigoTipoProducto() {
        return $this->vCodigoTipoProducto;
    }

    function getVNombre() {
        return $this->vNombre;
    }

    function setVCodigoTipoProducto($vCodigoTipoProducto) {
        $this->vCodigoTipoProducto = $vCodigoTipoProducto;
    }

    function setVNombre($vNombre) {
        $this->vNombre = $vNombre;
    }

    function getArray($accion) {
         
        if ($accion == 1) 
        {
            return array
            (
               "nombre" => $this->vNombre
            );
        } 
        elseif ($accion == 2) 
        {
            return array
            (
               "codigoTipoProducto" =>$this->vCodigoTipoProducto,
               "nombre" => $this->vNombre
            );
        }
        elseif ($accion == 3) 
        {
            return array
            (
               "codigoTipoProducto" =>$this->vCodigoTipoProducto
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
