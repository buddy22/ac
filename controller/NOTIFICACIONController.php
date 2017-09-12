<?php

class NOTIFICACIONController extends ControladorBase {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view("menu");
        $this->view("contenidoGrilla");
    }

    public function insert() {
        if (isset($_POST["fcm_token"])) {

          $fcm_token= $_POST["fcm_token"];
          
            
            $obProducto = new entidadProducto();
            $conn = $obProducto->conexion();
            $sql = "INSERT INTO fcm_info(fcm_token) VALUES('".$fcm_token."');";
            $result =$conn->query($sql);
            
            
            if($result==1)
            {
              $resultSet["success"] = true;
              $resultSet["message"] ="TOKEN registrado";
            }
            else
            {
              $resultSet["success"] = false;
              $resultSet["message"] =$conn->error;
            } 
            $obProducto->close($conn);
            echo json_encode($resultSet);
        }            
    }
    public function send_notification() {
        if (isset($_POST["message"])) {
            
            $obProducto = new entidadProducto();
            $conn = $obProducto->conexion();
            
            $message=$_POST["message"];
            
            $title= $_POST["title"];
            
            $path_to_fcm='https://fcm.googleapis.com/fcm/send';
            
            $server_key="AIzaSyAleIBrE29Rheiar5s14ipq5MOlwdnloBU";
            
            $sql = "SELECT  fcm_token FROM fcm_info";
            
            $result =$conn->query($sql);
            
            $row = $result->fetch_array(MYSQLI_ASSOC);
            
            $key = $row["fcm_token"];
            
            $headers= array(
                            'Authorization:key='.$server_key,
                            'Content-Type:application/json'
                            );
            
            $fields=array(
                          'to'=>$key,
                          'notification'=>array('title'=>$title,'body'=>$message)
                         );
            
            $payload = json_encode($fields);
            
            $curl_session =  curl_init();
            
            curl_setopt($curl_session, CURLOPT_URL,$path_to_fcm);
            curl_setopt($curl_session, CURLOPT_POST,true);
            curl_setopt($curl_session, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($curl_session, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($curl_session, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
            curl_setopt($curl_session, CURLOPT_POSTFIELDS,$payload);
            
            $result = curl_exec($curl_session);
            
            curl_close($curl_session);
            
            $resultSet["message"]=$result;
            $obProducto->close($conn);
            
            echo json_encode($resultSet);
        }            
    }
    
}
?>
