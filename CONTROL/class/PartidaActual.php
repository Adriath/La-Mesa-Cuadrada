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
    private $fecha ; // No sé cómo ponerla
    
    
    public function __construct($numJugadores=null, $listaJugadores=null, $listaGanadores=null, $rondas=null, $fecha=null) {
        
        parent::__construct() ;
        $idPartida = null ;
        $this->numJugadores = $numJugadores;
        $this->listaJugadores = $listaJugadores;
        $this->listaGanadores = $listaGanadores;
        $this->rondas = $rondas;
        $this->fecha = $fecha;
    }

    
    public function getIdPartida() {
        return $this->idPartida;
    }

    public function getNumJugadores() {
        return $this->numJugadores;
    }

    public function getListaJugadores() {
        return $this->listaJugadores;
    }

    public function getListaGanadores() {
        return $this->listaGanadores;
    }

    public function getRondas() {
        return $this->rondas;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setNumJugadores($numJugadores): void {
        $this->numJugadores = $numJugadores;
    }

    public function setListaJugadores($listaJugadores): void {
        $this->listaJugadores = $listaJugadores;
    }

    public function setListaGanadores($listaGanadores): void {
        $this->listaGanadores = $listaGanadores;
    }

    public function setRondas($rondas): void {
        $this->rondas = $rondas;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

            
     public function jsonSerialize() {
        
        return [
            'idPartida' => $this->idPartida,
            'numJugadores' => $this->numJugadores,
            'listaJugadores' => $this->listaJugadores,
            'listaGanadores' => $this->listaGanadores,
            'rondas' => $this->rondas,
            'puntos' => $this->puntos,
            'fecha' => $this->fecha
        ] ;
    
    }
    
}
