<?php
   class DETALLEController extends ControladorBase 
   {
       public function __construct() {
           parent::__construct();
       }
       
      public function insert()
      {
         if(isset($_POST["numeroCompra"]))
         {
             
            $obDetalle=new entidadDetalle();
            
            $obDetalle->setVNumeroCompra($_POST["numeroCompra"]);
            $obDetalle->setVCodigoProducto($_POST["codigoProducto"]);
            $obDetalle->setVCantidad($_POST["cantidad"]);
            $obDetalle->setVSubTotal($_POST["precio"]);
            
         
            $Mjs=$obDetalle->dynamic_Sp($sP="",$obDetalle->getArray($accion = 1));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
      }
      public function  update()
      {
         if(isset($_POST["codigoDetalle"]))
         {
             
            $obDetalle=new entidadDetalle();
            
            $obDetalle->setVCodigoDetalle($_POST["codigoDetalle"]);
            $obDetalle->setVNumeroCompra($_POST["numeroCompra"]);
            $obDetalle->setVCodigoProducto($_POST["codigoProducto"]);
            $obDetalle->setVCantidad($_POST["cantidad"]);
            $obDetalle->setVSubTotal($_POST["precio"]);
         
            $Mjs=$obProducto->dynamic_Sp($sP="",$obProducto->getArray($accion = 2));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
          
      }
      public function  delete()
      {
         if(isset($_POST["codigoDetalle"]))
         {
             
            $obDetalle=new entidadDetalle();
            
            $obDetalle->setVCodigoDetalle($_POST["codigoDetalle"]);
            $obDetalle->setVNumeroCompra($_POST["numeroCompra"]);
         
            $Mjs=$obDetalle->dynamic_Sp($sP="",$obDetalle->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
          
      }

      public function get()
      {
         if(isset($_POST["codigoDetalle"]))
         {
             
            $obDetalle=new entidadDetalle();
            
            $obDetalle->setVCodigoDetalle($_POST["codigoDetalle"]);
            $obDetalle->setVNumeroCompra($_POST["numeroCompra"]);
         
            $Mjs=$obDetalle->search($sP="",$obDetalle->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit();     
          }
      }
      
      public function getAll()
      {
          $obDetalle=new entidadDetalle();

          $Mjs=$obDetalle->get($sP ="");
       
          echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
          exit();
      }
   }
?>
