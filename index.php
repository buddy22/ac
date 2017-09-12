<?php
//Configuración global
require_once 'config/global.php';
//Base para los controladores
require_once 'core/ControladorBase.php';
 
//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.func.php';
 
//Cargamos controladores y acciones
session_start();
  if(isset($_SESSION["ID"])){
      //printf("existe");
     $saber=TRUE;
    }
    else
    {
     //printf("No existe");
     $saber=FALSE;
    }


if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    if($saber==TRUE)
    {
        $controllerObj=cargarControlador(CONTROLADOR_RESTAURANT);
        lanzarAccion($controllerObj);   
    }
    else
    {

        $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
        lanzarAccion($controllerObj);
    }
}
?>


