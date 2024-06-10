<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;

echo "Esta es la página Login.php" ;

var_dump($_POST) ;

$nombre = $_POST['nombreUsuario'] ;
$email = $_POST['usuario'] ;
$password = $_POST['password'] ;
$passwordRepetida = $_POST['passwordRepetida'] ;

$nombreValido = false ;
$emailValido = false ;
$passwordValido = false ;
$usuarioYaExiste = false ;

$formularioValido = false ;

// ------------- VALIDACIONES DE FORMATO ---------------

/**
 * Comprueba si el nombre es correcto.
 * 
 * @param string $nombre El nombre a comprobar.
 * 
 * @return bool true si el nombre es correcto, false en caso contrario.
 */
function validarNombre($nombre) {

    $valido = false ;
    $limiteCaracteres = 80 ;
    $dobleEspacio = '/  /u'; // No se permiten dos espacios seguidos

    // $nombre = trim($nombre) ; // Elimina los espacios

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
 * 
 * @return bool true si el correo es correcto, false en caso contrario.
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
 * @return bool true si la contraseña es correcta, false en caso contrario
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


/**
 * Compara dos passwords.
 * 
 * @param string $password El password introducido por el usuario
 * @param string $passwordRepetida El password repetido por el usuario
 * @return bool true si los passwords son iguales, false en caso contrario
 */
function validarPasswordRepetida($password, $passwordRepetida) {
    
    $valido = false ;

    if ($password === $passwordRepetida) {

        $valido = true ; 

    } else {

        $valido = false ;
    }

    return $valido ;
}


// ----------------- VALIDACIONES CON BBDD -----------------

/**
 * Comprueba si el usuario ya existe revisando el nombre de usuario y el email en la base de datos.
 * 
 * @param string $nombre El nombre de usuario introducido por el usuario.
 * @param string $email El email introducido por el usuario.
 * 
 * return bool true si el usuario ya existe, false en caso contrario.
 */
function compruebaUsuario($nombre, $email) {

    $_conexion = new BBDD() ; // Creamos el objeto conexión

    $valido = true ; // Daremos por hecho que es válido

    $conexion = $_conexion->getConexion() ;

    // Conectamos con la base de datos

    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE nombreUsuario = ? OR email = ?") ;
    $stmt->bind_param("ss", $nombre, $email) ;
    $stmt->execute() ;
    $result = $stmt->get_result() ;

    if ($result->num_rows > 0) // Si hay resultados
    {

        while ($row = $result->fetch_assoc()){ // Recorremos todos los resultados

            if ($row["nombreUsuario"] === $nombre){ // Si el nombre de usuario coincide...

                $valido = false ; // ...no es válido
                echo "Usuario ya existe" ;
            }
        
            if ($row["email"] === $email){ // Si el email coincide...

                $valido = false ; // ...no es válido
                echo "Email ya existe" ;
            }   
        }
    }

    return $valido ;
}

// ----------------- VALIDACIÓN DE FORMULARIO -----------------

function validarFormulario($nombre, $email, $password, $passwordRepetida) {

    $nombreValido = validarNombre($nombre) ;
    $emailValido = validarEmail($email) ;
    $passwordValido = validarPassword($password) ;  
    $passwordRepetidaValida = validarPasswordRepetida($password, $passwordRepetida) ;
    $usuarioYaExiste = compruebaUsuario($nombre, $email) ;
    

    if ($nombreValido && $emailValido && $passwordValido && $passwordRepetidaValida && $usuarioYaExiste)
    {
        echo "Es valido" ;
    }
    else
    {
        echo "No es válido" ;
    }
}

// function validarFormulario($nombre, $email) {

//     $usuarioYaExiste = compruebaUsuario($nombre, $email) ;
    

//     if ($usuarioYaExiste)
//     {
//         echo "Es valido" ;
//     }
//     else
//     {
//         echo "No es válido" ;
//     }
// }

validarFormulario($nombre, $email, $password, $passwordRepetida) ;