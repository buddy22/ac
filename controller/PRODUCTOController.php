<?php

class PRODUCTOController extends ControladorBase {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view("menu");
        $this->view("contenidoGrilla");
    }

    public function insert() {
        if (isset($_POST["nombre"])) {

            $obProducto = new entidadProducto();

            $obProducto->setVTipoProducto($_POST["tipoProducto"]);
            $obProducto->setVNombre($_POST["nombre"]);
            $obProducto->setVDescripcion($_POST["descripcion"]);
            $obProducto->setVPrecio($_POST["precio"]);
            $obProducto->setVEstado($_POST["estado"]);


            $Mjs = $obProducto->dynamic_Sp($sP = "sp_ins_PRODUCTO", $obProducto->getArray($accion = 1));
    
            echo json_encode($Mjs, JSON_FORCE_OBJECT);

            exit();
        }            
    }

    public function update() {
        if (isset($_POST["codigoProducto"])) {

            $obProducto = new entidadProducto();

            $obProducto->setVcodigoProducto($_POST["codigoProducto"]);
            $obProducto->setVTipoProducto($_POST["tipoProducto"]);
            $obProducto->setVNombre($_POST["nombre"]);
            $obProducto->setVDescripcion($_POST["descripcion"]);
            $obProducto->setVPrecio($_POST["precio"]);
            $obProducto->setVEstado($_POST["estado"]);
            

            $Mjs = $obProducto->dynamic_Sp($sP = "sp_upd_PRODUCTO", $obProducto->getArray($accion = 2));

            echo json_encode($Mjs, JSON_FORCE_OBJECT);

            exit();
        }
    }

    public function delete() {
        if (isset($_POST["codigoProducto"])) {

            $obProducto = new entidadProducto();

            $obProducto->setVcodigoProducto($_POST["codigoProducto"]);

            $Mjs = $obProducto->dynamic_Sp($sP = "sp_del_PRODUCTO", $obProducto->getArray($accion = 3));

            echo json_encode($Mjs, JSON_FORCE_OBJECT);

            exit();
        }
    }

    public function get() {
        if (isset($_POST["codigoProducto"])) {

            $obPlato = new entidadPlato();

            $obPlato->setVcodigoPlato($_POST["codigoProducto"]);

            $Mjs = $obPlato->search($sP = "", $obPlato->getArray($accion = 3));

            echo json_encode($Mjs, JSON_FORCE_OBJECT);

            exit();
        }
    }

    public function getAll() {
        $obProducto = new entidadProducto();

        $Mjs = $obProducto->get($sP = "sp_lis1_PRODUCTO");

        $resultSet["success"] = true;
        $resultSet["data"]= $Mjs;

        echo json_encode($resultSet);

        exit();
    }
    public function getAllM() {
        $obProducto = new entidadProducto();

        $obProducto->setVTipoProducto($_POST["tipoProducto"]);
        
        $Mjs = $obProducto->search($sP ="sp_lis_PRODUCTO",$obProducto->getArray($accion = 4));

        $resultSet["success"] = true;
        $resultSet["data"]= $Mjs;

        echo json_encode($resultSet);

        exit();
    }
    
}
?>
