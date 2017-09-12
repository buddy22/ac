<?php	
    	$host  ="localhost";
	$user  ="root";
	$clave ="flor22";
    	$db="restaurante";

	$conectarBD = new mysqli($host, $user, $clave, $db,3306);
        
	if ($conectarBD->connect_errno) 
	{
         session_start();
         $_SESSION["contador"]="fallo";
    	//die("ERROR : -> ".$conectarBD->connect_error);
         $this->redirect("RESTAURANT", "Index");
	}
        else
        {
          $exito="coneccion exitosa";  
        }

?>
