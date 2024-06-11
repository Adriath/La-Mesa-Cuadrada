<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/header.php" ;


// Si el usuario se ha registrado, mostrar el mensaje correspondiente

if (isset($_GET["registrado"])) {
    
    if ($_GET["registrado"] == "true") {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home_registrado.php" ;
    }
    else if ($_GET["registrado"] == "false") {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home_falloRegistro.php" ;
    }
}

// Si el usuario ha hecho login, mostrar la pantalla de bienvenida

else if (isset($_SESSION["login"])) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home_login.php" ;
}

// Si el usuario ha hecho logout, mostrar la pantalla de despedida

else if (isset($_GET["logout"])) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home_sesionCerrada.php" ;
}

// Si no está registrado ni logado muestra la pantalla normal

else
{
    require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/main_home.php" ;
}



require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/footer.php" ;

