<?php

require_once '../CONTROL/class/Response.php' ;
require_once '../CONTROL/class/Juego.php' ;

$metodo = $_SERVER['REQUEST_METHOD'] ;
$_respuestas = new Response() ;
$_juego = new Juego() ;

switch ($metodo) {

    // --------------- GET ---------------

    case 'GET':
        
        if (isset($_GET["page"])) {

            $pagina = $_GET["page"] ;
            $listaJuegos = $_juego->listaJuegos($pagina) ;
            header('Content-Type: application/json') ;
            echo json_encode($listaJuegos) ;
            http_response_code(200) ;
        }
        else if (isset($_GET["id"])) {

            $id_juego = $_GET["id"] ;
            $datosJuego = $_juego->obtenerJuego($id_juego) ;
            header('Content-Type: application/json') ;
            echo json_encode($datosJuego) ;
            http_response_code(200) ;
        }
        break;

        // --------------- POST ---------------
    
    case 'POST':
        
        // Recibimos los datos enviados

        $postBody = file_get_contents('php://input') ;

        // Enviamos los datos al manejador

        $datosArray = $_juego->post($postBody) ;

        // Devolvemos una respuesta

        header('Content-Type: application/json') ;
        if (isset($datosArray["result"]["error_id"])) {
            
            $responseCode = $datosArray["result"]["error_id"] ;
            http_response_code($responseCode) ;
        }
        else{

            http_response_code(200) ;
        }
        echo json_encode($datosArray) ; // Devolver datos

        break;

        // --------------- PUT ---------------

    case 'PUT':
        
        // Recibimos los datos enviados

        $postBody = file_get_contents('php://input') ;

         // Enviamos los datos al manejador

         $datosArray = $_juego->put($postBody) ;

         header('Content-Type: application/json') ;
         if (isset($datosArray["result"]["error_id"])) {
             
             $responseCode = $datosArray["result"]["error_id"] ;
             http_response_code($responseCode) ;
         }
         else{
 
             http_response_code(200) ;
         }
         echo json_encode($datosArray) ; // Devolver datos

        break;

        // --------------- DELETE ---------------

    case 'DELETE':
        echo "Hola delete" ;
        break;

    default:
        header('Content-Type: application/json') ;
        $datosArray = $_respuestas->error_405() ; // Metodo no permitido
        
        echo json_encode($datosArray) ;
        break;
}