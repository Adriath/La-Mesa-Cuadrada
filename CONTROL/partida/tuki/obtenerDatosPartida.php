<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Juego.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/ModeloJuego.php" ;

$enlace ;

if (isset($_GET['pagina'])) {

    $enlace = $_GET['pagina'] ;
}

$juego = ModeloJuego::obtenerJuego($enlace) ; // Obtenemos objeto de tipo Juego