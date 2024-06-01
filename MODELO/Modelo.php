<?php

require_once '../CONTROL/class/Response.php' ;
require_once '../CONTROL/class/Juego.php' ;

$metodo = $_SERVER['REQUEST_METHOD'] ;
$_respuestas = new Response() ;
$_juego = new Juego() ;

switch ($metodo) {

    case 'GET':
        
        if (isset($_GET["page"])) {

            $pagina = $_GET["page"] ;
            $listaJuegos = $_juego->listaJuegos($pagina) ;

            echo json_encode($listaJuegos) ;
        }
        else if (isset($_GET["id"])) {

            $id_juego = $_GET["id"] ;
            $datosJuego = $_juego->obtenerJuego($id_juego) ;

            echo json_encode($datosJuego) ;
        }
        break;
    
    case 'POST':
        echo "Hola post" ;
        break;

    case 'PUT':
        echo "Hola put" ;
        break;

    case 'DELETE':
        echo "Hola delete" ;
        break;

    default:
        header('Content-Type: application/json') ;
        $datosArray = $_respuestas->error_405() ; // Metodo no permitido
        
        echo json_encode($datosArray) ;
        break;
}