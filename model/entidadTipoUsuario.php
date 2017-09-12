<?php

class entidadTipoUsuario extends EntidadBase {

    private $vcodigoTipoUsuario = 0;
    private $vNombre = "";

    Public function __construct() {
        parent::__construct();
    }

    function getVNombre() {
        return $this->vNombre;
    }
    function getVcodigoTipoUsuario() {
        return $this->vcodigoTipoUsuario;
    }

    function setVcodigoTipoUsuario($vcodigoTipoUsuario) {
        $this->vcodigoTipoUsuario = $vcodigoTipoUsuario;
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
               "codigoTipoUsuario" =>$this->vcodigoTipoUsuario,
               "nombre" => $this->vNombre
            );
        }
        elseif ($accion == 3) 
        {
            return array
            (
               "codigoTipoUsuario" =>$this->vcodigoTipoUsuario
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
