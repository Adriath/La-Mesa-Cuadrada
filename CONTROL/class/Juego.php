<?php

require_once '../MODELO/BBDD.php' ;
require_once 'Response.php' ;

class Juego extends BBDD {

    private $tabla = "juego" ;

    public function listaJuegos($pagina = 1){ // Lista los datos de la tabla juego filtrando por la página

        $inicio = 0 ;
        $cantidad = 100 ; // Cambiar esta variable para modificar la cantidad de datos por página

        if ($pagina > 1){

            $inicio = ($cantidad * ($pagina - 1)) + 1 ;
            $cantidad = $cantidad * $pagina ;
        }

        $query = "SELECT id_juego,nombre,enlace,imagen,descripcion,minJugadores,maxJugadores FROM " . $this->tabla . " LIMIT $inicio,$cantidad" ;
        $datos = parent::obtenerDatos($query) ;

        return $datos ;
    }

    public function obtenerJuego($id){ // Obtiene los datos de un juego

        $query = "SELECT id_juego,nombre,enlace,imagen,descripcion,minJugadores,maxJugadores FROM " . $this->tabla . " WHERE id_juego = $id" ;

        return parent::obtenerDatos($query) ;
    }

}