<?php

class TIPOPRODUCTOController extends ControladorBase {

    public function __construct() {
        parent::__construct();
    }
    
        public function index() {
        $this->view("menu");
        $this->view("contenidoGrilla");
    }

    public function insert() {

        $obTipoProducto = new entidadTipoProducto();

        $obTipoProducto->setVNombre($_POST["nombre"]);

        $Mjs = $obTipoProducto->dynamic_Sp($sP = "sp_ins_TIPOPRODUCTO", $obTipoProducto->getArray($accion = 1));

        echo $Mjs;

        exit();
    }

    public function update() {
       
            $obTipoProducto = new entidadTipoProducto();

            $obTipoProducto->setVCodigoTipoProducto($_POST["codigo"]);

            $obTipoProducto->setVNombre($_POST["nombre"]);

            $Mjs = $obTipoProducto->dynamic_Sp($sP = "sp_upd_TIPOPRODUCTO", $obTipoProducto->getArray($accion = 2));

            echo json_encode($Mjs, JSON_FORCE_OBJECT);

            exit();
     
    }

    public function delete() {
        if (isset($_POST["codigoTipoProducto"])) {

            $obTipoProducto = new entidadTipoProducto();

            $obTipoProducto->setVCodigoTipoProducto($_POST["codigoTipoProducto"]);

            $Mjs = $obTipoProducto->dynamic_Sp($sP = "sp_del_TIPOPRODUCTO", $obTipoProducto->getArray($accion = 3));

             echo json_encode($Mjs, JSON_FORCE_OBJECT);
            exit();
        }
    }

    public function get() {

        $obProducto = new entidadTipoProducto();

        $Mjs = $obProducto->get($sP = "sp_lis_TIPOPRODUCTO");

        echo json_encode($Mjs, JSON_FORCE_OBJECT);

        exit();
    }

    public function getAll() {
        $obProducto = new entidadTipoProducto();

        $Mjs = $obProducto->getAll($sP = "sp_lis_TIPOPRODUCTO");

        echo json_encode($Mjs);
       return json_encode($Mjs);
        exit();
        
    }
    public function getAllM() {
        $obProducto = new entidadTipoProducto();

        $Mjs = $obProducto->get($sP = "sp_lis1_TIPOPRODUCTO");

        $resultSet["success"] = true;
        $resultSet["data"]= $Mjs;

        echo json_encode($resultSet);

        exit();
        
    }
}

?>
