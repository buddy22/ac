<?php
  class IMAGEController extends ControladorBase
  {
    public function __construct() {
        parent::__construct();
    }
            
    public function uploadImage()
    {
        $obGMS86REGARC = new entidadGMS86REGARC();
        
        if($_FILES['image']['name']!='')
        {
            $extension=end(explode(".",$_FILES['image']['name']));
            
            $Allowed_type= array("JPG","jpg","jpeg","png","gif","PNG");
            
            if(in_array($extension,$Allowed_type))
            {
                
               
                $carpeta = "images";
               
             /*   if(!file_exists($carpeta))
                {
                    mkdir($carpeta);
                }*/
                
                $codigoProducto = $_POST["co"];
                
            // $consecutivo = $obGMS86REGARC->getConse($sP ="sp_lis_gms87regcon");
                
                $new_name = $codigoProducto."RESTA".".".$extension;
                
                $path = $carpeta . "/" . $new_name;
                
                if(move_uploaded_file($_FILES['image']['tmp_name'],$path))
                {
                    $obGMS86REGARC->setVGMS86COCODI($codigoProducto);
                    $obGMS86REGARC->setVGMS86CARUTA($path);
                    
                    $Mjs = $obGMS86REGARC->dynamic_Sp($sP ="sp_ins_IMAGEN", $obGMS86REGARC->getArray($accion = 1));

                    echo $Mjs;            
                }
                else
                {
                     echo ' <div class="col-md-8">
                            <img src="' . $path . '" class="img-responsive"/>
                            </div>';
                }
            } 
            else 
            {
              echo '<div>¡El formato es invalido!</div>';
            }
        }
        else 
        {
           echo '<div>¡Seleccione un archivo!</div>';
        }
    }
    public function getAllimages()
    {
     if (isset($_POST["co"])) 
        {

            $obGMS86REGARC = new entidadGMS86REGARC();
            
            $obGMS86REGARC->setVGMS86COCODI($_POST["co"]);

            $files = $obGMS86REGARC->search($sP="sp_lis_IMAGEN", $obGMS86REGARC->getArray($accion = 0));

            echo json_encode($files, JSON_FORCE_OBJECT);
        }
    }

    public function deleteImage()
    {
        $obGMS86REGARC = new entidadGMS86REGARC();
        
        if (!empty($_POST["path"])) {
            
         if (unlink($_POST["path"]))
            {
                $obGMS86REGARC->setVGMS86COCODI($_POST["coPath"]);
                
                $Mjs = $obGMS86REGARC->dynamic_Sp($sP = "sp_del_IMAGEN",$obGMS86REGARC->getArray($accion = 0));
                
                echo $Mjs;
            }
        }    

    }
  }
?>

