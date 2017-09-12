<?php

class entidadCompra extends EntidadBase {

    private $vCodigoCompra = 0;
    private $vNumeroCompra=0;
    private $vCodigoUsuario = 0;
    private $vFechaCompra=0;
    private $vEstado=0;

    Public function __construct() {
        parent::__construct();
    }
    function getVCodigoCompra() {
        return $this->vCodigoCompra;
    }

    function getVNumeroCompra() {
        return $this->vNumeroCompra;
    }

    function getVCodigoUsuario() {
        return $this->vCodigoUsuario;
    }

    function getVFechaCompra() {
        return $this->vFechaCompra;
    }

    function getVEstado() {
        return $this->vEstado;
    }

    function setVCodigoCompra($vCodigoCompra) {
        $this->vCodigoCompra = $vCodigoCompra;
    }

    function setVNumeroCompra($vNumeroCompra) {
        $this->vNumeroCompra = $vNumeroCompra;
    }

    function setVCodigoUsuario($vCodigoUsuario) {
        $this->vCodigoUsuario = $vCodigoUsuario;
    }

    function setVFechaCompra($vFechaCompra) {
        $this->vFechaCompra = $vFechaCompra;
    }

    function setVEstado($vEstado) {
        $this->vEstado = $vEstado;
    }

        
    function getArray($accion) {
         
        if ($accion == 1) 
        {
            return array
            (
               "numeroCompra" => $this->vNumeroCompra,
               "codigoUsuario" => $this->vCodigoUsuario,
               "fechaCompra" => $this->vFechaCompra,
               "estado" => $this->vEstado
            );
        } 
        elseif ($accion == 2) 
        {
            return array
            (
               "codigoCompra" => $this->vCodigoCompra,
               "numeroCompra" => $this->vNumeroCompra,
               "codigoUsuario" => $this->vCodigoUsuario,
               "fechaCompra" => $this->vFechaCompra,
               "estado" => $this->vEstado
            );
        }
        elseif ($accion == 3) 
        {
            return array
            (
                "codigoCompra" => $this->vCodigoCompra,
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


