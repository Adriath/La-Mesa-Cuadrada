<?php

require_once '../MODELO/BBDD.php' ;

$conexion = new BBDD() ;

$query = "SELECT * FROM juego" ;

print_r($conexion->obtenerDatos($query)) ;