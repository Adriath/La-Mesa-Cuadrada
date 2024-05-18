
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

            default:
                break;
        }
    } else {
        require_once 'VISTA/home.php';
    }
    
}
