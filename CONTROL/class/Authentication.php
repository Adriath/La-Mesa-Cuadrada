<?php

// require_once 'MODELO/BBDD.php' ;
// require_once 'Response.php' ;
require_once 'MODELO/BBDD.php' ;
require_once 'CONTROL/class/Response.php' ;

class Authentication extends BBDD {

    public function login($json){ // Coge los datos y comprueba el usuario y la contraseña

        $respuesta = new Response() ;
        $datos = json_decode($json, true) ;

        if (!isset($datos['usuario']) || !isset($datos['password'])){
            // Error con los campos

            return $respuesta->error_400() ;
        }
        else{
            // Todo está bien

            $usuario = $datos['usuario'] ;
            $password = $datos['password'] ;
            // $password = parent::encriptar($password) ; // Encriptar contraseña
            $datos = $this->obtenerDatosUsuario($usuario) ;

            if ($datos){ // Si existe el usuario
                // Verifica la contraseña

                if ($password == $datos[0]["password"]){ // Si la contraseña existe

                    if ($datos[0]['estado'] == "Activo"){ // Si el usuario está activo
                        // Crear el token

                        $verificar = $this->insertarToken($datos[0]["id_usuario"]) ;
                        if ($verificar){
                            // Si se guardó el token

                            $result = $respuesta->response ;
                            $result["result"] = array(
                                "token" => $verificar
                            ) ;

                            return $result ;

                        }
                        else{
                            // Error al guardar el token

                            return $respuesta->error_500("Error interno, no hemos podido guardar el token") ;
                        }
                    }
                    else{
                        // El usuario está inactivo
                        return $respuesta->error_200("El usuario está inactivo") ;
                    }
                }
                else{
                    // La contraseña no es igual

                    return $respuesta->error_200("El password es inválido") ;
                }
            }
            else{
                // Si no existe el usuario

                return $respuesta->error_200("El usuario $usuario no existe") ;
            }
        }
    }

    private function obtenerDatosUsuario($correo) { // Obtener datos de usuario

        $query = "SELECT id_usuario,email,password,estado FROM usuario WHERE email = '$correo'" ; // Obtener datos de usuario donde usuario = correo
        $datos = parent::obtenerDatos($query) ; // Aquí está usando un método de la clase BBDD

        if (isset($datos[0]["id_usuario"])){ // Si en el array resultante hay un campo id_usuario...

            return $datos ; // ...devuélvelo
        }
        else{ // En caso contrario...

            return 0 ; // ...devuelve 0
        }
    }


    private function insertarToken($id){ // Genera token

        $val = true ;
        $token = bin2hex(openssl_random_pseudo_bytes(16, $val)) ; // Generar token
        $date = date("Y-m-d H:i") ; // Obtener fecha actual
        $estado = "Activo" ;

        $query = "INSERT INTO usuarios_token (id_usuario, token, estado, fecha) VALUES ('$id', '$token', '$estado', '$date')" ; // Insertar token
        $verifica = parent::nonQuery($query) ; // Envía filas afectadas

        if ($verifica){
            // Si se guardó el token...

            return $token ;
        }
        else{
            // No se guardó el token

            return 0 ;
        }
    }

    
}