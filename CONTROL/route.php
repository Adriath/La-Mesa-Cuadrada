
<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Usuario.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Authentication.php" ;

$ruta = $_SERVER['REQUEST_URI'];
$metodo = $_SERVER['REQUEST_METHOD'];

$pagina = basename(parse_url($ruta, PHP_URL_PATH)); // Extrae el nombre del archivo o ruta de la URL

// RUTA PRINCIPAL: http://localhost/La_Mesa_Cuadrada/index.php

// Redirigir a /home si la página solicitada es index.php
if ($pagina === "index.php" || $pagina === "") {
    header("Location: http://localhost/La_Mesa_Cuadrada/home");
    exit();
}

if ($metodo == 'GET') {
    if (isset($pagina)) {
        
        switch ($pagina) {
            case "":
            case "/":
            case "index":
            case "home":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/home.php" ;
                break;

            case "buscador":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/buscador.php" ;
                break;

            case "login":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/login.php" ;
                break;

            case "partida":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/area_juego.php" ;
                break;

            case "scattergories":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/scattergories.php" ;
                break;

            case "tukistan":
                require_once 'VISTA/tukistan.php';
                break;

            case "sushi_go":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/sushiGo.php" ;
                break;

            default:
            echo "ERROR 404. PÁgina no encontrada";
                break;
        }
    } else {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/home.php" ;
    }
    
}
else if ($metodo == 'POST') {


    if (isset($pagina)){


        switch ($pagina) {
            case "registro":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/registro.php" ;
                break;

            case "login":
                require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/login.php" ;
                break;
        }


    }
}