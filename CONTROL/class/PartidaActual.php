<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Response.php" ;
/**
 * Description of PartidaActual
 *
 * @author Adrián Arjona
 */
class PartidaActual extends BBDD implements JsonSerializable {
    
    private $idPartida ;
    private $numJugadores ;
    private $listaJugadores = array() ;
    private $listaGanadores = array() ;
    private $rondas ;
    private $puntos ;
    private $ganador = false ;
    private $fecha ; // No sé cómo ponerla
    
    
    public function __construct($numJugadores=null, $listaJugadores=null, $listaGanadores=null, $rondas=null, $puntos=null, $ganador=null, $fecha=null) {
        
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
