<?php
   class TIPOUSUARIOController extends ControladorBase 
   {
       public function __construct() {
           parent::__construct();
       }
       
      public function insert()
      {
         if(isset($_POST["nombre"]))
         {
             
            $obTipoUsuario=new entidadTipoUsuario();
            
            $obTipoUsuario->setVNombre($_POST["nombre"]);
         
            $Mjs=$obTipoUsuario->dynamic_Sp($sP="",$obTipoUsuario->getArray($accion = 1));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
      }
      public function  update()
      {
         if(isset($_POST["codigoTipoUsuario"]))
         {
             
            $obTipoUsuario=new entidadTipoUsuario();
            
            $obTipoUsuario->setVcodigoTipoUsuario($_POST["codigoTipoUsuario"]);
            
            $obTipoUsuario->setVNombre($_POST["nombre"]);
         
            $Mjs=$obTipoUsuario->dynamic_Sp($sP="",$obTipoUsuario->getArray($accion = 2));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
          
      }
      public function  delete()
      {
         if(isset($_POST["codigoTipoUsuario"]))
         {
             
            $obTipoUsuario=new entidadTipoUsuario();
            
            $obTipoUsuario->setVcodigoTipoUsuario($_POST["codigoTipoUsuario"]);
         
            $Mjs=$obTipoUsuario->dynamic_Sp($sP="",$obTipoUsuario->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
          
      }

      public function get()
      {
          if(isset($_POST["codigoTipoUsuario"]))
         {
             
            $obTipoUsuario=new entidadTipoUsuario();
            
            $obTipoUsuario->setVcodigoTipoUsuario($_POST["codigoTipoUsuario"]);
         
            $Mjs=$obTipoUsuario->search($sP="",$obTipoUsuario->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit();     
          }
      }
      
      public function getAll()
      {
          $obTipoUsuario=new entidadTipoUsuario();
   
          $Mjs=$obTipoUsuario->get($sP = "");
       
          echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
          exit();
      }
   }
?>