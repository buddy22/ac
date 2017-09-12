<?php
require 'Conectar.php';
class EntidadBase extends Conectar
{
    private $conn;
    
    public function __construct()
    {
        parent::__construct();
    }
   // este metodo sirve para update y insert, además es dinamico.
    public function dynamic_Sp($sP, $data) {
        
        $this->conn = $this->conexion();

        $query = "CALL $sP(";

        foreach ($data as $key) {
            
            if (gettype($key) == "integer") {
                
                $query .= "" . $key . ", ";
                
            }elseif (gettype($key) == "string") {
                
                $query .= "'" . $key . "', ";
                
            }elseif (gettype($key)== "double") {
                
                $query .= "" . $key . ", ";  
            }
        }

        $query = substr($query, 0, -2);

        $query .= ")";

        $Accion = $this->conn->query($query);
        
        $this->close($this->conn);
        
        return $Accion;
    }

     public function search($sP, $data) {
         
        $this->conn = $this->conexion(); 
         
        $query = "CALL $sP(";

        foreach ($data as $key) {
            
            if (gettype($key) == "integer") {
                
                $query .= "" . $key . ", ";
                
            }elseif (gettype($key) == "string") {
                
                $query .= "'" . $key . "', ";
                
            }elseif (gettype($key)== "double") {
                
                $query .= "" . $key . ", ";  
            }
        }

        $query = substr($query, 0, -2);

        $query .= ")";

        $Accion = $this->conn->query($query);
        
        $this->close($this->conn);
        
      //Devolvemos el resultset en forma de array de objetos
        if ($Accion->num_rows >= 1) {
            while ($row = $Accion->fetch_object()) {

                $resultSet[] = $row;
            }
            return $resultSet;
        } else {
            return false;
        }
    }

    public function getSearch($sP, $data) {
        
        $this->conn = $this->conexion();
        
        $query = "CALL $sP(";

        foreach ($data as $key) {
            
            if (gettype($key) == "integer") {
                
                $query .= "" . $key . ", ";
                
            }elseif (gettype($key) == "string") {
                
                $query .= "'" . $key . "', ";
                
            }elseif (gettype($key)== "double") {
                
                $query .= "" . $key . ", ";  
            }
        }

        $query = substr($query, 0, -2);

        $query .= ")";

        $Accion = $this->conn->query($query);
        
        $this->close($this->conn);
        
      //Devolvemos el resultset en forma de array de objetos
        if ($Accion->num_rows >= 1) {
            while ($row = $Accion->fetch_object()) {

                $resultSet["data"][] = $row;
            }
            return $resultSet;
        } else {
            return false;
        }
    }
     public function getSearchUser($sP, $data) {
        
        $this->conn = $this->conexion();
        
        $query = "CALL $sP(";

        foreach ($data as $key) {
            
            if (gettype($key) == "integer") {
                
                $query .= "" . $key . ", ";
                
            }elseif (gettype($key) == "string") {
                
                $query .= "'" . $key . "', ";
                
            }elseif (gettype($key)== "double") {
                
                $query .= "" . $key . ", ";  
            }
        }

        $query = substr($query, 0, -2);

        $query .= ")";

        $Accion = $this->conn->query($query);
        
        $this->close($this->conn);
        
      //Devolvemos el resultset en forma de array de objetos
        if ($Accion->num_rows >= 1) {
            $resultSet["success"] = true;
            $resultSet["message"] ="Usuario Autenticado";
            while ($row = $Accion->fetch_object()) {

                $resultSet["data"][] = $row;
            }
            return $resultSet;
        } 
        else {
             $resultSet["success"] = false;
            $resultSet["message"] ="Usuario no Autenticado";

          return $resultSet;
        }
    }
    public function getAll($sP) {
        $this->conn = $this->conexion();
         
        $query = $this->conn->query("CALL $sP()");

        $this->close($this->conn);

        //Devolvemos el resultset en forma de array de objetos
        if ($query->num_rows >= 1) {
            while ($row = $query->fetch_object()) {

                $resultSet["data"][] = $row;
            }
            return $resultSet;
        } else {
            return false;
        }
    }
    
    public function get($sP) {
        
        $this->conn = $this->conexion();

        $query = $this->conn->query("CALL $sP()");

      //  $this->conectar->close($this->db);
        $this->close($this->conn);

        //Devolvemos el resultset en forma de array de objetos
        if ($query->num_rows >= 1) {
            while ($row = $query->fetch_object()) {

                $resultSet[] = $row;
            }
            return $resultSet;
        } else {
            return false;
        }
    }
    public function getConse($sP) {
        $this->conn = $this->conexion();
        
        $query = $this->conn->query("CALL $sP()");

        $this->close($this->conn);

        //Devolvemos el resultset en forma de array de objetos
        if ($query->num_rows >= 1)
        {
            while ($row = $query->fetch_assoc()) 
            {
                $resultSet = $row["numeroCompra"];
            }
            return $resultSet;
        } else {
            return false;
        }
    }
 public function getSearchM($sP) {
        
        $this->conn = $this->conexion();

        $Accion = $this->conn->query("CALL $sP()");
        
        $this->close($this->conn);
        
      //Devolvemos el resultset en forma de array de objetos
        if ($Accion->num_rows >= 1) {
            $resultSet["success"] = true;
            $resultSet["message"] ="Autenticado";
            while ($row = $Accion->fetch_object()) {

                $resultSet["data"] = $row;
            }
            return $resultSet;
        } 
        else {
             $resultSet["success"] = false;
            $resultSet["message"] ="No Autenticado";

          return $resultSet;
        }
    }
}
?>
