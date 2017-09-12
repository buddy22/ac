<?php

class entidadAC02CURSO extends EntidadBase {

    private $vAC02CODIGO;
    private $vAC02NOMBRE;
    private $vAC02CANTIDAD_HORAS_MAXIMA;
    private $vAC02ESTADO;
      
    Public function __construct() {
     parent::__construct();  
     
      $this-> vAC02CODIGO = 0;
      $this-> vAC02NOMBRE = "";
      $this-> vAC02CANTIDAD_HORAS_MAXIMA = "";
      $this-> vAC02ESTADO = "";  
    }
    function getVAC02CODIGO() {
        return $this->vAC02CODIGO;
    }

    function getVAC02NOMBRE() {
        return $this->vAC02NOMBRE;
    }

    function getVAC02CANTIDAD_HORAS_MAXIMA() {
        return $this->vAC02CANTIDAD_HORAS_MAXIMA;
    }

    function getVAC02ESTADO() {
        return $this->vAC02ESTADO;
    }

    function setVAC02CODIGO($vAC02CODIGO) {
        $this->vAC02CODIGO = $vAC02CODIGO;
    }

    function setVAC02NOMBRE($vAC02NOMBRE) {
        $this->vAC02NOMBRE = $vAC02NOMBRE;
    }

    function setVAC02CANTIDAD_HORAS_MAXIMA($vAC02CANTIDAD_HORAS_MAXIMA) {
        $this->vAC02CANTIDAD_HORAS_MAXIMA = $vAC02CANTIDAD_HORAS_MAXIMA;
    }

    function setVAC02ESTADO($vAC02ESTADO) {
        $this->vAC02ESTADO = $vAC02ESTADO;
    }

    function getArray($accion) {
         
        if ($accion == 1) 
        {
            return array
            (
               "AC02NOMBRE" =>$this->vAC02NOMBRE,
               "AC02CANTIDAD_HORAS_MAXIMA" => $this->vAC02CANTIDAD_HORAS_MAXIMA
            );
        } 
        elseif ($accion == 2) 
        {
            return array
            (
               "AC02CODIGO" =>$this->vAC02CODIGO, 
               "AC02NOMBRE" =>$this->vAC02NOMBRE,
               "AC02CANTIDAD_HORAS_MAXIMA" => $this->vAC02CANTIDAD_HORAS_MAXIMA      
            );
        }
        elseif ($accion == 3) 
        {
            return array
            (
              "AC02CODIGO" =>$this->vAC02CODIGO
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