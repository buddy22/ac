<?php
 class FACTURAController extends ControladorBase 
   {
       public function __construct() {
           parent::__construct();
       }
       
     public function insertFactura()
     {
      if (isset($_POST["idUser"]))
         {
            $obProducto = new EntidadBase();
           
            $user= $_POST['idUser'];
            $jsonInput = $_POST['data'];
            
            $data = json_decode($jsonInput,true);
            $numeroCompra=$obProducto->getConse($sP="sp_lis_CONSECUTIVO");
            
            $conn = $obProducto->conexion();
           try
            {
                $conn->autocommit(false); 
                
                $sql = "INSERT INTO compra(numeroCompra,codigoUsuario,fechaCompra,estado) VALUES ($numeroCompra,$user,NOW(),'1')";
                $result =$conn->query($sql);
                
                if (!$result) 
                {
                  throw new Exception($conn->error);
                }
                
                foreach($data as $detalle)
                {
                    $idProduc = $detalle['idProduc'];
                    $precio = $detalle['precio'];
                    $cantidad = $detalle['cantidad'];

                   $sql = "INSERT INTO detalle(numeroCompra,codigoProducto,cantidad,precio)VALUES($numeroCompra,$idProduc,$cantidad,$precio)";
                   $result = $conn->query($sql);
                   if (!$result) 
                   {
                    throw new Exception($conn->error);
                   }
                }
                             
                $sql ="SELECT codigoCompra,codigoUsuario,fechaCompra,(SELECT SUM(cantidad*precio) FROM detalle WHERE numeroCompra=$numeroCompra) AS total FROM compra WHERE  numeroCompra=$numeroCompra";
                $result = $conn->query($sql);
                if (!$result) 
                {
                  throw new Exception($conn->error);
                }
               
              $conn->commit();
              $conn->autocommit(true);
              
              $sql ="SELECT codigoProducto,cantidad,precio,(cantidad*precio) AS subtotal FROM detalle WHERE  numeroCompra=$numeroCompra";
              $resultset = $conn->query($sql);
                         
                if (!$resultset) 
                {
                  throw new Exception($conn->error);
                }
              
              $row = $result->fetch_array(MYSQLI_ASSOC);
              
              $resultSet["success"] = true;
              
              $resultSet["message"]="Compra realizada";
              
              $resultSet["codigoCompra"]=$row["codigoCompra"];
              $resultSet["codigoUsuario"]=$row["codigoUsuario"];
              $resultSet["fechaCompra"]=$row["fechaCompra"];
              $resultSet["total"]=$row["total"];
              
              while ($row = $resultset->fetch_object()) 
              {
                $resultSet["data"][] = $row;
              }
           }
           catch (Exception $e) 
           {
             $conn->rollback();
             $conn->autocommit(true);
             $resultSet["success"] = false;
             $resultSet["message"] = $e->getMessage();
           }
           $obProducto->close($conn);
           
           echo json_encode($resultSet); 
         }   
      }
      
      public function getAlLEncabezado()
      {
        $obCompra=new entidadCompra();
            
        $Mjs = $obCompra->getAll($sP = "sp_lis_encabezadoCompra");

        echo json_encode($Mjs);

        exit();
      }
      
      public function getAlLDetalles()
      {
          $obDetalle=new entidadDetalle();
          $obDetalle->setVNumeroCompra($_POST["codigo"]);
          $Mjs=$obDetalle->search($sP ="sp_lis_detalleCompra", $obDetalle->getArray($accion = 4));
       
          echo json_encode($Mjs,JSON_FORCE_OBJECT);
       
          exit();
      }
   }


