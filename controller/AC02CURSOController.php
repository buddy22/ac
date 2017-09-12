<?php
class AC02CURSOController extends ControladorBase {

    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->view("menu");
        $this->view("contenidoGrilla");
    }

    public function insert() 
    {
      if (isset($_POST["AC02NOMBRE"]))
        {
          
            $obAC02CURSO = new entidadAC02CURSO();

            $obAC02CURSO->setVAC02NOMBRE($_POST["AC02NOMBRE"]);
            $obAC02CURSO->setVAC02CANTIDAD_HORAS_MAXIMA($_POST["AC02CANTIDAD_HORAS_MAXIMA"]);

            $result = $obAC02CURSO->dynamic_Sp($sP = "sp_ins_ac02curso", $obAC02CURSO->getArray($accion = 1));

            echo $result;

            exit();
        }
    }

    public function update() {
                
        if (isset($_POST["AC02CODIGO"]))
        {
            $obAC02CURSO = new entidadAC02CURSO();
            
            $obAC02CURSO->setVAC02CODIGO($_POST["AC02CODIGO"]);
            $obAC02CURSO->setVAC02NOMBRE($_POST["AC02NOMBRE"]);
            $obAC02CURSO->setVAC02CANTIDAD_HORAS_MAXIMA($_POST["AC02CANTIDAD_HORAS_MAXIMA"]);

            $result = $obAC02CURSO->dynamic_Sp($sP = "sp_upd_ac02curso", $obAC02CURSO->getArray($accion = 2));

            echo $result;

            exit();
        }
     
    }
    public function update_estado()
    {       
        if (isset($_POST["AC02CODIGO"]))
        {
            $obAC02CURSO = new entidadAC02CURSO();
            
            $obAC02CURSO->SetVAC02CODIGO($_POST["AC02CODIGO"]);

            $result = $obAC02CURSO->dynamic_Sp($sP = "sp_upd1_ac02curso", $obAC02CURSO->getArray($accion = 3));

            echo $result;

            exit();
        }
    }

    public function delete() 
    {
        if (isset($_POST["AC02CODIGO"]))
        {
            $obAC02CURSO = new entidadAC02CURSO();
            
            $obAC02CURSO->setVAC02CODIGO($_POST["AC02CODIGO"]);

            $result = $obAC02CURSO->dynamic_Sp($sP = "sp_del_ac02curso", $obAC02CURSO->getArray($accion = 3));

            echo $result;

            exit();
        }
    }

    public function get()
    {
        $obAC02CURSO = new entidadAC02CURSO();

        $resulset = $obAC02CURSO->get($sP = "sp_lis1_ac02curso");

        echo json_encode($resulset, JSON_FORCE_OBJECT);

        exit();
    }

    public function getAll() 
    {
        
        $obAC02CURSO = new entidadAC02CURSO();

        $resulset = $obAC02CURSO->getAll($sP = "sp_lis_ac02curso");

        echo json_encode($resulset);
        
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
