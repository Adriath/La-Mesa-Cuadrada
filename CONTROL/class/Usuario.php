<?php

// require_once 'MODELO/BBDD.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;
// require_once 'CONTROL/class/Response.php' ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Response.php" ;

/**
 * Description of Usuario
 *
 * @author Adrián Arjona
 */
class Usuario extends BBDD implements JsonSerializable{
    
    private $usuario ;
    private $password ;
    
    public function __construct($usuario=null, $password=null) {
        parent::__construct();
        $this->usuario = $usuario;
        $this->password = $password;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }


    // -------------------- FUNCIONES --------------------------

    public function obtenerUsuario($id = null) // Obtiene usuario por ID o todos
    { // Obtiene los datos de un juego

        $query = "SELECT email,password FROM usuario" ;

        if ($id != null) { // Si no se ha introducido ID
            
            $query = "SELECT email,password FROM usuario WHERE id_usuario = $id";
            }
            
        return parent::obtenerDatos($query);
    }


    public function jsonSerialize() {
        
        return [
            'Usuario' => $this->usuario,
            'Password' => $this->password
        ] ;
    
    }


}
