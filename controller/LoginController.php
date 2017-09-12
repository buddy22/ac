<?php
//Configuración global
require_once 'config/global.php';
//Base para los controladores
 
//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.func.php';
class LoginController extends ControladorBase {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //Cargamos la vista index y le pasamos valores
        $this->view("Login");
    }

    public function verificarlogin() 
    {
      //  $usuario = htmlentities(addslashes($_POST["Usuario"]));
      //  $password = htmlentities(addslashes($_POST["password"]));
        require("config/Conexion.php");
        $usu = htmlentities(addslashes($_POST["Usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));

//Cambiar campo cedula a uniue
        if ($sql = mysqli_prepare($conectarBD, "SELECT clave, codigoUsuario FROM usuario where correo = ? and Estado = 1")) {
            mysqli_stmt_bind_param($sql,"s",$usu);
            mysqli_stmt_execute($sql);
            mysqli_stmt_bind_result($sql, $clave,$codigoUsuario);
            mysqli_stmt_fetch($sql);
        }  
        
        if (password_verify($password, $clave)) {
            //session_destroy();
            //session_start();
            $_SESSION["Usuario"] = $usu;
            $_SESSION["ID"] = $codigoUsuario;
            
             $controllerObj=cargarControlador(CONTROLADOR_RESTAURANT);
             lanzarAccion($controllerObj);
            
            //$this->redirect("RESTAURANT", "index");
        } 
        else 
        {
           $this->redirect("Login", "index");   
        }
    }
    
    public function CerrarSesion(){
        session_start();
        $_SESSION["contador"]="";
        session_destroy();
        $this->redirect("Login", "index");
    }
    
        public function logout(){
          //session_start();
          session_destroy();
         $this->redirect("Login", "index");    
    }


}
