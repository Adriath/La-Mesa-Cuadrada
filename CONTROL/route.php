
<?php

$ruta = $_SERVER['REQUEST_URI'];
$metodo = $_SERVER['REQUEST_METHOD'];

// RUTA PRINCIPAL: http://localhost/La_Mesa_Cuadrada/index.php

if ($metodo == 'GET') {
    if (isset($_GET["pagina"])) {
        
        switch ($_GET["pagina"]) {
            case "home":
                require_once 'VISTA/home.php';
                break;

            case "buscador":
                require_once 'VISTA/buscador.php';
                break;

            case "tuki":
                require_once 'VISTA/area_juego.php';
                break;

            case "scattergories":
                require_once 'VISTA/scattergories.php';
                break;

            case "tukistan":
                require_once 'VISTA/tukistan.php';
                break;

            case "sushi_go":
                require_once 'VISTA/sushiGo.php';
                break;

            default:
                break;
        }
    } else {
        require_once 'VISTA/home.php';
    }
    
}
