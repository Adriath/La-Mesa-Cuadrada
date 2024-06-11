<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Response.php" ;
/**
 * Description of PartidaActual
 *
 * @author Adrián Arjona
 */
class PartidaActual extends BBDD implements JsonSerializable {
    
    private $numJugadores ;
    private $listaJugadores = array() ;
    private $listaGanadores = array() ;
    private $rondas ;
    private $puntos ;
    private $ganador = false ;
    private $fecha ; // No sé cómo ponerla
    
    
    public function __construct($numJugadores, $listaJugadores, $listaGanadores, $rondas, $puntos, $ganador, $fecha) {
        
        parent::__construct() ;
        $this->numJugadores = $numJugadores;
        $this->listaJugadores = $listaJugadores;
        $this->listaGanadores = $listaGanadores;
        $this->rondas = $rondas;
        $this->puntos = $puntos;
        $this->ganador = $ganador;
        $this->fecha = $fecha;
    }

    
     public function jsonSerialize() {
        
        return [
            'listaJugadores' => $this->listaJugadores,
            'listaGanadores' => $this->listaGanadores,
            'rondas' => $this->rondas,
            'puntos' => $this->puntos,
            'fechas' => $this->fecha
        ] ;
    
    }
    
}
