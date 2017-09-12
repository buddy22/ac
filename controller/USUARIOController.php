<?php
   class USUARIOController extends ControladorBase 
   {
       public function __construct() {
           parent::__construct();
       }
       
      public function insert()
      {
         if(isset($_POST["nombre"]))
         {
             
            $obUsuario=new entidadUsuario();
            
            $obUsuario->setVCodigoTipoUsuario($_POST["codigoTipoUsuario"]);

            $obUsuario->setVNombre($_POST["nombre"]);

            $obUsuario->setVApellido($_POST["apellido"]);

            $obUsuario->setVSegundoApellido($_POST["segundoApellido"]);

            $obUsuario->setVDireccion($_POST["direccion"]);

            $obUsuario->setVTelefono($_POST["telefono"]);

            $obUsuario->setVContrasena($_POST["contrasena"]);

            $obUsuario->setVCorreo($_POST["email"]);

            $obUsuario->setVEstado($_POST["estado"]);
            
         
            $Mjs=$obUsuario->dynamic_Sp($sP="sp_ins_USUARIO",$obUsuario->getArray($accion = 1));

            if($Mjs==1)
            {
              $resultSet["success"] = true;
              $resultSet["message"] ="Usuario registrado";
            }
            else
            {
              $resultSet["success"] = false;
              $resultSet["message"] ="Usuario no registrado";
            } 
           
            echo json_encode($resultSet);
          }
      }
      public function  update()
      {
         if(isset($_POST["codigoUsuario"]))
         {
             
            $obUsuario=new entidadUsuario();
            
            $obUsuario->setVcodigoUsuario($_POST["codigoUsuario"]);
            
            $obUsuario->setVNombre($_POST["nombre"]);
            
            $obUsuario->setVApellido($_POST["apellido"]);
            
            $obUsuario->setVSegundoApellido($_POST["segundoApellido"]);
            
            $obUsuario->setVDireccion($_POST["direccion"]);
            
            $obUsuario->setVTelefono($_POST["telefono"]);
            
            $obUsuario->setVCodigoTipoUsuario($_POST["codigoTipoUsuario"]);

            $obUsuario->setVCorreo($_POST["email"]);
         
            $Mjs=$obUsuario->dynamic_Sp($sP="",$obUsuario->getArray($accion = 2));

            if($Mjs==1)
            {
             $resultSet["success"] = true;
             $resultSet["message"] ="Usuario registrado";
            }
            else
            {
              $resultSet["success"] = false;
              $resultSet["message"] ="Usuario no registrado";
            } 
           
            echo json_encode($resultSet);
       
            exit(); 
           
          }
          
      }
      public function  delete()
      {
         if(isset($_POST["codigoUsuario"]))
         {
             
            $obUsuario=new entidadUsuario();
            
            $obUsuario->setVcodigoUsuario($_POST["codigoUsuario"]);
         
            $Mjs=$obUsuario->dynamic_Sp($sP="",$obUsuario->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit(); 
           
          }
          
      }

      public function get()
      {
         if(isset($_POST["codigoUsuario"]))
         {
             
            $obUsuario=new entidadUsuario();
            
            $obUsuario->setVcodigoUsuario($_POST["codigoUsuario"]);
         
            $Mjs=$obUsuario->search($sP="",$obUsuario->getArray($accion = 3));
           
            echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
            exit();     
          }
      }
       public function getUser()
      {
         if(isset($_POST["email"]))
         {
             
            $obUsuario=new entidadUsuario();
            
            $obUsuario->setVCorreo($_POST["email"]);
            $obUsuario->setVContrasena($_POST["password"]);
         
            $Mjs=$obUsuario->getSearchUser($sP="sp_lis1_USUARIO",$obUsuario->getArray($accion = 4));
           
            echo json_encode($Mjs);
       
            exit();     
          }
          else{
            echo json_encode('error');
       
            exit(); 
          }
      }
      public function getAll()
      {
          $obUsuario=new entidadUsuario();
   
          $Mjs=$obUsuario->get($sP ="");

          echo json_encode($Mjs);
       
          exit();
      }
      
   }
?>