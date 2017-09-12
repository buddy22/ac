<?php
   class COMPRAController extends ControladorBase 
   {
       public function __construct() {
           parent::__construct();
       }
       
      public function insert()
      {
         if(isset($_POST["numeroCompra"]))
         {
             
            $obCompra=new entidadCompra();
            
            $obCompra->setVNumeroCompra($_POST["numeroCompra"]);
            $obCompra->setVCodigoUsuario($_POST["codigoUsuario"]);
            $obCompra->setVFechaCompra($_POST["fechaCompra"]);
            $obCompra->setVEstado($_POST["subtotal"]);
            
            $Mjs=$obCompra->dynamic_Sp($sP="",$obCompra->getArray($accion = 1));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
      }
      public function  update()
      {
         if(isset($_POST["numeroCompra"]))
         {
             
            $obCompra=new entidadCompra();
            
            $obCompra->setVNumeroCompra($_POST["numeroCompra"]);
            $obCompra->setVCodigoUsuario($_POST["codigoUsuario"]);
            $obCompra->setVFechaCompra($_POST["fechaCompra"]);
            $obCompra->setVEstado($_POST["subtotal"]);
         
            $Mjs=$obCompra->dynamic_Sp($sP="",$obCompra->getArray($accion = 2));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
          
      }
      public function  delete()
      {
         if(isset($_POST["numeroCompra"]))
         {
             
            $obCompra=new entidadCompra();
            
            $obCompra->setVNumeroCompra($_POST["numeroCompra"]);
         
            $Mjs=$obDetalle->dynamic_Sp($sP="",$obDetalle->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
          
      }

      public function get()
      {
           
         if(isset($_POST["numeroCompra"]))
         {
             
            $obCompra=new entidadCompra();
            
            $obCompra->setVNumeroCompra($_POST["numeroCompra"]);
         
            $Mjs=$obCompra->search($sP="",$obCompra->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit();     
          }
      }
      
      public function getAll()
      {
            $obCompra=new entidadCompra();
            
            $obCompra->setVNumeroCompra($_POST["numeroCompra"]);
       
          echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
          exit();
      }
   }
?>
