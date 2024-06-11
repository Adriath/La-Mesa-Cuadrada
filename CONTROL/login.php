<?php

session_start() ;

echo "Estamos en el login.php" ;

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;


$usuario = $_POST['usuarioLogin'] ;
$password = $_POST['passwordLogin'] ;

var_dump($_POST) ;

$usuarioExiste = false ;
$passwordExiste = false ;

$loginCorrecto = false ;


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


// ----------------- VALIDACIONES CON BBDD -----------------

/**
 * Comprueba si el usuario ya existe revisando el nombre de usuario y el email en la base de datos.
 * 
 * @param string $nombre El nombre de usuario introducido por el usuario.
 * @param string $email El email introducido por el usuario.
 * 
 * return bool true si el usuario ya existe, false en caso contrario.
 */
function compruebaLogin($usuario, $password) {

    $_conexion = new BBDD() ; // Creamos el objeto conexión

    $valido = false ; // Daremos por hecho que es válido

    $conexion = $_conexion->getConexion() ;

    // Conectamos con la base de datos

    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE nombreUsuario = ? OR email = ? OR password = ?") ;
    $stmt->bind_param("sss", $usuario, $usuario, $password) ;
    $stmt->execute() ;
    $result = $stmt->get_result() ;

    if ($result->num_rows > 0) // Si hay resultados
    {

        while ($row = $result->fetch_assoc()){ // Recorremos todos los resultados

            if ($row["nombreUsuario"] === $usuario){ // Si el nombre de usuario coincide...

                $usuarioExiste = true ; // ...es válido
                echo "Usuario ya existe" ;
            }        
            else if ($row["email"] === strtolower($usuario)){ // Si el email coincide...

                $usuarioExiste = true ; // ...es válido
                echo "Email ya existe" ;
            }   

            if ($row["password"] === $password){ // Si la contraseña coincide...

                $passwordExiste = true ; // ...es válida
                echo "Password ya existe" ;
            }
        }

        if ($usuarioExiste && $passwordExiste){

            $valido = true ;
        }

    }

    return $valido ;
}

// ----------------- VALIDACIÓN DE FORMULARIO -----------------

function hacerLogin($usuario, $password) {

    $loginCorrecto = compruebaLogin($usuario, $password) ;
    
    if ($loginCorrecto){

        echo "Login correcto" ;
    }

    else {

        echo "Login incorrecto" ;
    }
    
}

hacerLogin($usuario, $password) ;