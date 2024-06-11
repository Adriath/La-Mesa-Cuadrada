<?php
session_start() ;

echo "Estoy dentro del logout.php" ;

$_SESSION = [] ;

session_unset() ;

session_destroy() ;

header("Location: http://localhost/La_Mesa_Cuadrada/home") ;