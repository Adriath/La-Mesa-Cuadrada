<?php

echo "Esta es la página Login.php" ;

var_dump($_POST) ;

$nombre = $_POST['nombreUsuario'] ;
$email = $_POST['usuario'] ;
$password = $_POST['password'] ;
$passwordRepetida = $_POST['passwordRepetida'] ;

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

/**
 * Valida el formato del correo electrónico.
 * 
 * @param string $email El correo a comprobar.
 */
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

/**
 * Comprueba si la contraseña es correcta.
 * REQUISITOS:
 * - Mínimo 8 caracteres
 * - Máximo 15 caracteres
 * - Debe contener al menos una mayúscula
 * - Debe contener al menos una minúscula
 * - Debe contener al menos un dígito
 * - No debe contener espacios
 * - Debe contener al menos un caracter especial
 * 
 * @param string $password La contraseña a comprobar.
 */
function validarPassword($password) {
    
    $valido = false ;

    $min8CaracteresValido = false ;
    $max15CaracteresValido = false ;
    $contieneMayusculaValido = false ;
    $contieneMinusculaValido = false ;
    $contieneDigitoValido = false ;
    $noContieneEspaciosValido = false ;
    $contieneCaracterEspecialValido = false ;

    $min8Caracteres = '/^.{8,}$/'; // Mínimo 8 caracteres
    $max15Caracteres = '/^.{8,15}$/'; // Máximo 15 caracteres
    $contieneMayuscula = '/[A-Z]/'; // Debe contener al menos una mayúscula
    $contieneMinuscula = '/[a-z]/'; // Debe contener al menos una minúscula
    $contieneDigito = '/\d/'; // Debe contener al menos un dígito
    $noContieneEspacios = '/^\S+$/'; // No debe contener espacios
    $contieneCaracterEspecial = '/[¡!@#$%^&*(),.¿?":{}|<>_\/\\\'\'ºª·€¬=\[\]\+\-";]/u'; // Debe contener al menos un carácter especial


    // $password = trim($password) ; // Elimina los espacios

    if (empty($password)) // Si el password está vacío
    {
        $valido = false ;
    }
    else // Si no está vacío
    {
        if (!preg_match($min8Caracteres, $password)) // Si no cumple con el mínimo de caracteres
        {
            $min8CaracteresValido = false ;
            $valido = false ;
        }
        else
        {
            $min8CaracteresValido = true ;
        }

        if (!preg_match($max15Caracteres, $password)) // Si no cumple con el máximo de caracteres
        {
            $max15CaracteresValido = false ;
            $valido = false ;
        }
        else
        {
            $max15CaracteresValido = true ;
        }

        if (!preg_match($contieneMayuscula, $password)) // Si no contiene una mayúscula
        {
            $contieneMayusculaValido = false ;
            $valido = false ;
        }
        else
        {
            $contieneMayusculaValido = true ;
        }

        if (!preg_match($contieneMinuscula, $password)) // Si no contiene una minúscula
        {
            $contieneMinusculaValido = false ;
            $valido = false ;
        }
        else
        {
            $contieneMinusculaValido = true ;
        }

        if (!preg_match($contieneDigito, $password)) // Si no contiene un dígito
        {
            $contieneDigitoValido = false ;
            $valido = false ;
        }
        else
        {
            $contieneDigitoValido = true ;
        }

        if (!preg_match($noContieneEspacios, $password)) // Si contiene espacios
        {
            $noContieneEspaciosValido = false ;
            $valido = false ;
        }
        else
        {
            $noContieneEspaciosValido = true ;
        }

        if (!preg_match($contieneCaracterEspecial, $password)) // Si no contiene caracteres especiales
        {
            $contieneCaracterEspecialValido = false ;
            $valido = false ;
        }
        else
        {
            $contieneCaracterEspecialValido = true ;
        }

        if ($min8CaracteresValido && $max15CaracteresValido && $contieneMayusculaValido && $contieneMinusculaValido && $contieneDigitoValido && $noContieneEspaciosValido && $contieneCaracterEspecialValido)
        {
            $valido = true ;
        }
    }

    return $valido ;

}


function validarPasswordRepetida($password, $passwordRepetida) {
    
    $valido = false ;

    if ($password === $passwordRepetida) {

        $valido = true ; 

    } else {

        $valido = false ;
    }

    return $valido ;
}

function validarFormulario($password, $passwordRepetida) {

    $passwordRepetidaValida = validarPasswordRepetida($password, $passwordRepetida) ;
    

    if ($passwordRepetidaValida)
    {
        echo "Es valido" ;
    }
    else
    {
        echo "No es válido" ;
    }
}

validarFormulario($password,$passwordRepetida) ;