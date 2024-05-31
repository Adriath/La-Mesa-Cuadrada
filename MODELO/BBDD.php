<?php

class BBDD{

    private $server;
    private $user;
    private $password;
    private $database;

    private $conexion ;

    function __construct(){
        
        $listadatos = $this->datosConexion() ;

        foreach ($listadatos as $key => $value) {

            $this->server = $value["server"] ;
            $this->user = $value["user"] ;
            $this->password = $value["password"] ;
            $this->database = $value["database"] ;
        }

        $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database) ;
        if ($this->conexion->connect_errno) {
            echo "Algo va mal con la conexión" ;
            die() ;
        }
    }

    private function datosConexion(){

        $direccion = dirname(__FILE__) ;
        $jsondata = file_get_contents($direccion . "/" . "config") ;
        
        return json_decode($jsondata, true) ; // True convierte en array asociativo
    }


    private function convertirUTF8($array){

        array_walk_recursive($array, function(&$item, $key){

            if(!mb_detect_encoding($item, 'utf-8', true)){

                $item = mb_convert_encoding($item, 'UTF-8') ;
            }
        }) ;

        return $array ;
    }

    public function obtenerDatos($sqlstr){

        $results = $this->conexion->query($sqlstr) ;
        $resultArray = array() ;

        foreach ($results as $key) {
            
            $resultArray[] = $key ;
        }

        return $this->convertirUTF8($resultArray) ;
    }

    public function nonQuery($sqlstr){

        $results = $this->conexion->query($sqlstr) ;

        return $this->conexion->affected_rows ;
    }


    // INSERTAR
    
    public function nonQueryId($sqlstr){

        $results = $this->conexion->query($sqlstr) ;
        $filas = $this->conexion->affected_rows ;

        if ($filas >= 1)
        {
            return $this->conexion->insert_id ;
        }
        else
        {
            return 0 ;
        }
    }

}