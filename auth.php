<?php

require_once 'CONTROL/class/Authentication.php' ;
require_once 'CONTROL/class/Response.php' ;

$_auth = new Authentication() ;
$_respuestas = new Response() ;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si va por método POST

    $postBody = file_get_contents('php://input') ; // Obtener datos del body
    $datosArray = $_auth->login($postBody) ; // Llamar al login
    print_r(json_encode($datosArray)) ; // Devolver datos
}
else{

    echo "Método no permitido" ;
}