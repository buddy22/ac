<?php

class entidadGMS86REGARC extends EntidadBase {

    private $vGMS86COCODI = 0;
    private $vGMS86CARUTA = "";

    public function __construct() {
        parent::__construct();
    }
    function getVGMS86COCODI() {
        return $this->vGMS86COCODI;
    }

    function getVGMS86CARUTA() {
        return $this->vGMS86CARUTA;
    }

    function setVGMS86COCODI($vGMS86COCODI) {
        $this->vGMS86COCODI = $vGMS86COCODI;
    }

    function setVGMS86CARUTA($vGMS86CARUTA) {
        $this->vGMS86CARUTA = $vGMS86CARUTA;
    }
    
    function getArray($accion) {
        if ($accion == 0) {
            return array
                (
                "GMS86COCODI" => $this->vGMS86COCODI
            );
        } elseif ($accion == 1) {
            return array
                (
                "GMS86COCODI" => $this->vGMS86COCODI,
                "GMS86CARUTA" => $this->vGMS86CARUTA
            );
        }
    }

}
?>
