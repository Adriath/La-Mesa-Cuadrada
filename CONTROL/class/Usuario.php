<?php

/**
 * Description of Usuario
 *
 * @author Adrián Arjona
 */
class Usuario implements JsonSerializable{
    
    private $usuario ;
    private $password ;
    
    public function __construct($usuario, $password) {
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


    public function jsonSerialize() {
        
        return [
            'Usuario' => $this->usuario,
            'Password' => $this->password
        ] ;
    
    }


}
