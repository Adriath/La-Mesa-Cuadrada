<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/header.php" ;


if (isset($_GET["registrado"])) {
    
    if ($_GET["registrado"] == "true") {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home_registrado.php" ;
    }
    else if ($_GET["registrado"] == "false") {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home_falloRegistro.php" ;
    }
}
else
{
    require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home.php" ;
}


require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/footer.php" ;

