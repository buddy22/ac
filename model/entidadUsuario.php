<?php
class entidadUsuario extends EntidadBase {

    private $vcodigoUsuario = 0;
    private $vNombre = "";
    private $vApellido= "";
    private $vSegundoApellido = "";
    private $vDireccion="";
    private $vTelefono=0;
    private $vCodigoTipoUsuario=0;
    private $vContrasena="";
    private $vCorreo="";
    private $vEstado="";

    Public function __construct() {
        parent::__construct();
    }
    function getVcodigoUsuario() {
        return $this->vcodigoUsuario;
    }

    function getVNombre() {
        return $this->vNombre;
    }

    function getVApellido() {
        return $this->vApellido;
    }

    function getVSegundoApellido() {
        return $this->vSegundoApellido;
    }

    function getVDireccion() {
        return $this->vDireccion;
    }

    function getVTelefono() {
        return $this->vTelefono;
    }

    function getVCodigoTipoUsuario() {
        return $this->vCodigoTipoUsuario;
    }

    function setVcodigoUsuario($vcodigoUsuario) {
        $this->vcodigoUsuario = $vcodigoUsuario;
    }

    function setVNombre($vNombre) {
        $this->vNombre = $vNombre;
    }

    function setVApellido($vApellido) {
        $this->vApellido = $vApellido;
    }

    function setVSegundoApellido($vSegundoApellido) {
        $this->vSegundoApellido = $vSegundoApellido;
    }

    function setVDireccion($vDireccion) {
        $this->vDireccion = $vDireccion;
    }

    function setVTelefono($vTelefono) {
        $this->vTelefono = $vTelefono;
    }

    function setVCodigoTipoUsuario($vCodigoTipoUsuario) {
        $this->vCodigoTipoUsuario = $vCodigoTipoUsuario;
    }

    function getVContrasena() {
        return $this->vContrasena;
    }

    function setVContrasena($vContrasena) {
        $this->vContrasena = $vContrasena;
    }
    function getVCorreo() {
        return $this->vCorreo;
    }

    function setVCorreo($vCorreo) {
        $this->vCorreo = $vCorreo;
    }

    function getVEstado() {
        return $this->vEstado;
    }

    function setVEstado($vEstado) {
        $this->vEstado = $vEstado;
    }
    
    function getArray($accion) {
         
        if ($accion == 1) 
        {
            return array
            (
               "CodigoTipoUsuario" => $this->vCodigoTipoUsuario,
               "nombre" => $this->vNombre,
               "Apellido" => $this->vApellido,
               "SegundoApellido" => $this->vSegundoApellido,
               "Telefono" => $this->vTelefono,
               "Direccion" => $this->vDireccion,
               "Estado" => $this->vEstado,
               "Contrasena" => $this->vContrasena,
               "correo" => $this->vCorreo
            );
        } 
        elseif ($accion == 2) 
        {
            return array
            (
               "codigoUsuario" => $this->vcodigoUsuario,
               "nombre" => $this->vNombre,
               "Apellido" => $this->vApellido,
               "SegundoApellido" => $this->vSegundoApellido,
               "Direccion" => $this->vDireccion,
               "Telefono" => $this->vTelefono,
               "CodigoTipoUsuario" => $this->vCodigoTipoUsuario,
               "CodigoTipoUsuario" => $this->vContrasena
            );
        }
        elseif ($accion == 3) 
        {
            return array
            (
               "codigoUsuario" => $this->vcodigoUsuario
            );
        }
        elseif ($accion == 4) 
        {
            return array
            (
               "correo" => $this->vCorreo,
               "contrasena" => $this->vContrasena
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
