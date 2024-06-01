<?php

require_once 'CONTROL/class/Authentication.php' ;
require_once 'CONTROL/class/Response.php' ;

$_auth = new Authentication() ;
$_respuestas = new Response() ;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si va por método POST

    // Recibir datos

    $postBody = file_get_contents('php://input') ; // Obtener datos del body

    // Enviamos los datos al manejador

    $datosArray = $_auth->login($postBody) ; // Llamar al login

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
}
else{

    header('Content-Type: application/json') ;
    $datosArray = $_respuestas->error_405() ;
    
    echo json_encode($datosArray) ;
}