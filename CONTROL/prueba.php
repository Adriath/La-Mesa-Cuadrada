<?php

require_once '../MODELO/BBDD.php' ;

$conexion = new BBDD() ;

// $query = "SELECT * FROM juego" ;
$query = "INSERT INTO `juego` (`id_juego`, `nombre`, `enlace`, `imagen`, `descripcion`, `minJugadores`, `maxJugadores`) 
VALUES (NULL, 'Carcassone', 'carcasone', 'carcassonne_card.jpg', 'Texto descriptivo para Carcassone.', '2', '10')" ;

print_r($conexion->nonQuery($query)) ;