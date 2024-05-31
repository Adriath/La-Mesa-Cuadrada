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
}