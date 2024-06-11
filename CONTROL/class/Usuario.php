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
    
    private $idUsuario ;
    private $nombreUsuario ;
    private $email ;
    private $password ;
    private $estado ;
    
    public function __construct($idUsuario=null, $nombreUsuario=null, $email=null, $password=null, $estado=null) {
        parent::__construct();
        $this->idUsuario = $idUsuario ;
        $this->nombreUsuario = $nombreUsuario ;
        $this->email = $email;
        $this->password = $password;
        $this->estado = $estado ;
    }
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEstado() {
        return $this->estado;
    }

//    public function setIdUsuario($idUsuario): void {
//        $this->idUsuario = $idUsuario;
//    }

    public function setNombreUsuario($nombreUsuario): void {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    
    // -------------------- FUNCIONES --------------------------

    public function obtenerUsuario($id = null, $nombreUsuario = null) // Obtiene usuario por ID o todos
    { // Obtiene los datos de un juego

        
        if ($id != null) // Si se ha introducido ID
        {     
            $query = "SELECT email,password FROM usuario WHERE id_usuario = $id";
        }
        else if ($nombreUsuario != null) // Si se ha introducido nombre de usuario
        {
            $query = "SELECT * FROM usuario WHERE nombreUsuario = $nombreUsuario";
        }
        else
        {
            $query = "SELECT * FROM usuario" ;
        }
            
        return parent::obtenerDatos($query);
    }


    public function jsonSerialize() {
        
        return [
            'idUsuario' => $this->idUsuario,
            'nombreUsuario' => $this->nombreUsuario,
            'email' => $this->email,
            'password' => $this->password,
            'estado' => $this->estado
        ] ;
    
    }


}
