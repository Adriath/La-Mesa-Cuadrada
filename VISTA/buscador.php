<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/header_buscador.php" ;

if (isset($_GET["resultado"]) && isset($_GET["encontrado"])) {

    if ($_GET["encontrado"] == "true") {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_buscador_resultadoEncontrado.php" ;
    }
    else{
        require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_buscador.php" ;
    }
}


require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/footer.php" ;


