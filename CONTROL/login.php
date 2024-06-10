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

/**
 * Comprueba si el nombre es correcto.
 * 
 * @param string $nombre El nombre a comprobar.
 */
function nombreValido($nombre) {

    $valido = false ;
    $limiteCaracteres = 80 ;
    $dobleEspacio = '/  /u'; // No se permiten dos espacios seguidos

    $nombre = trim($nombre) ; // Elimina los espacios

    if (empty($nombre)) // Si el nombre está vacío
    {
        $valido = false ;
    }
    else
    {
        if (strlen($nombre) > $limiteCaracteres) // Si el nombre es demasiado extenso
        {
            $valido = false ;
        }
        else if (preg_match($dobleEspacio, $nombre)) // Si el nombre contiene dos espacios seguidos
        {
            $valido = false ;
        }
        else
        {
            $valido = true ;
        }
    }

    return $valido ;
}

function validarEmail($email) {

    $regexEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; // La expresión regular del correo electrónico

    $email = trim($email) ; // Elimina los espacios
    $email = strtolower($email) ; // Pasa el correo a minúsculas

    if (empty($email)) // Si el email está vacío
    {
        $valido = false ;
    }
    else
    {
        if (!preg_match($regexEmail, $email)) // Si el formato del correo no es correcto
        {
            $valido = false ;
        }
        else
        {
            $valido = true ;
        }
    }

    return $valido ;
    // return filter_var($email, FILTER_VALIDATE_EMAIL) ;
}


function validarFormulario($email) {

    // $nombreValido = nombreValido($nombre) ;
    $emailValido = validarEmail($email) ;

    if ($emailValido)
    {
        echo "Es valido" ;
    }
    else
    {
        echo "No es válido" ;
    }
}

validarFormulario($email) ;