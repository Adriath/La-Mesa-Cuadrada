<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Response.php" ;

/**
 * Description of Jugador
 *
 * @author Adrián Arjona
 */
class Jugador extends BBDD implements JsonSerializable {
    
    private $puntos ;
    private $ganador = false ;
    private $eliminado = false ;
    
    public function __construct($puntos=null, $ganador=null, $eliminado=null) {
        
        parent::__construct() ;
        $this->puntos = $puntos;
        $this->ganador = $ganador;
        $this->eliminado = $eliminado;
    }
    
    public function getPuntos() {
        return $this->puntos;
    }

    public function getGanador() {
        return $this->ganador;
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function setPuntos($puntos): void {
        $this->puntos = $puntos;
    }

    public function setGanador($ganador): void {
        $this->ganador = $ganador;
    }

    public function setEliminado($eliminado): void {
        $this->eliminado = $eliminado;
    }

        
      public function jsonSerialize() {
        
        return [
            'puntos' => $this->puntos,
            'ganador' => $this->ganador,
            'eliminado' => $this->eliminado
        ] ;
    
    }

}
