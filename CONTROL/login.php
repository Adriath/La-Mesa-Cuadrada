<?php

echo "Esta es la página Login.php" ;

$nombre = $_POST['nombreUsuario'] ;
$email = $_POST['usuario'] ;
$password = $_POST['password'] ;

$nombreValido = false ;
$emailValido = false ;
$passwordValido = false ;

$nombreYaExiste = false ;
$emailYaExiste = false ;

$formularioValido = false ;

// ------------- VALIDACIONES DE FORMATO ---------------

function validarEmail($email) {

    return filter_var($email, FILTER_VALIDATE_EMAIL) ;
}

$email1 = "ejemplo@dominio.com";
$email2 = "incorrecto";

if (validarEmail($email2)) {
 echo "El correo electrónico $email1 es válido.";
} else {
 echo "El correo electrónico $email1 no es válido.";
}

// Salida: El correo electrónico ejemplo@dominio.com es válido.

