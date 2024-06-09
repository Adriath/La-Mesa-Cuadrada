<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Response.php" ;

class Juego extends BBDD
{

    private $tabla = "juego";
    private $idJuego = "";
    private $nombre = "";
    private $enlace = "";
    private $imagen = "";
    private $descripcion = "";
    private $minJugadores = "";
    private $maxJugadores = "";

    private $token = "";

    public function listaJuegos($pagina = 1)
    { // Lista los datos de la tabla juego filtrando por la página

        $inicio = 0;
        $cantidad = 100; // Cambiar esta variable para modificar la cantidad de datos por página

        if ($pagina > 1) {

            $inicio = ($cantidad * ($pagina - 1)) + 1;
            $cantidad = $cantidad * $pagina;
        }

        $query = "SELECT id_juego,nombre,enlace,imagen,descripcion,minJugadores,maxJugadores FROM " . $this->tabla . " LIMIT $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);

        return $datos;
    }

    public function obtenerJuego($id)
    { // Obtiene los datos de un juego

        $query = "SELECT id_juego,nombre,enlace,imagen,descripcion,minJugadores,maxJugadores FROM " . $this->tabla . " WHERE id_juego = $id";

        return parent::obtenerDatos($query);
    }


    public function post($json)
    {

        $_respuesta = new Response();
        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            // No existe el token

            return $_respuesta->error_401();
        } else {

            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {

                if (!isset($datos["nombre"]) || !isset($datos["enlace"]) || !isset($datos["imagen"]) || !isset($datos["minJugadores"]) || !isset($datos["maxJugadores"])) {
                    // Si faltan datos

                    return $_respuesta->error_400();
                } else {
                    // Todo esta bien

                    $this->nombre = $datos["nombre"];
                    $this->enlace = $datos["enlace"];
                    $this->imagen = $datos["imagen"];
                    $this->descripcion = $datos["descripcion"];
                    $this->minJugadores = $datos["minJugadores"];
                    $this->maxJugadores = $datos["maxJugadores"];
                    // if(isset($datos['maxJugadores'])) {$this->maxJugadores = $datos['maxJugadores'] ;} // Para evitar errores

                    $resp = $this->insertarJuego();

                    if ($resp) {

                        $respuesta = $_respuesta->response;
                        $respuesta["result"] = array(
                            "id_juego" => $resp
                        );

                        return $respuesta;
                    } else {

                        $_respuesta->error_500("Error interno, no hemos podido insertar el juego");
                    }
                }
            } else {

                return $_respuesta->error_401("El token que envió es inválido o ha caducado");
            }
        }
    }


    private function insertarJuego()
    {

        $query = "INSERT INTO " . $this->tabla . " (id_juego, nombre, enlace, imagen, descripcion, minJugadores, maxJugadores)
        VALUES (NULL, '$this->nombre', '$this->enlace', '$this->imagen', '$this->descripcion', '$this->minJugadores', '$this->maxJugadores')";

        $resp = parent::nonQueryId($query);

        if ($resp) {

            return $resp;
        } else {

            return 0;
        }
    }


    public function put($json)
    {

        $_respuesta = new Response();
        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            // No existe el token

            return $_respuesta->error_401();
        } else {

            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {

                if (!isset($datos["id_juego"])) {
                    // Si faltan datos

                    return $_respuesta->error_400();
                } else {
                    // Todo esta bien

                    if (isset($datos['id_juego'])) {
                        $this->idJuego = $datos['id_juego'];
                    }
                    $this->nombre = $datos["nombre"];
                    $this->enlace = $datos["enlace"];
                    $this->imagen = $datos["imagen"];
                    $this->descripcion = $datos["descripcion"];
                    $this->minJugadores = $datos["minJugadores"];
                    $this->maxJugadores = $datos["maxJugadores"];
                    // if(isset($datos['maxJugadores'])) {$this->maxJugadores = $datos['maxJugadores'] ;} // Para evitar errores

                    $resp = $this->modificarJuego();

                    if ($resp) {

                        $respuesta = $_respuesta->response;
                        $respuesta["result"] = array(
                            "id_juego" => $this->idJuego
                        );

                        return $respuesta;
                    } else {

                        $_respuesta->error_500("Error interno, no hemos podido insertar el juego");
                    }
                }
            } else {

                return $_respuesta->error_401("El token que envió es inválido o ha caducado");
            }
        }
    }


    private function modificarJuego()
    {

        $query = "UPDATE " . $this->tabla . " SET nombre='" . $this->nombre . "', enlace='" . $this->enlace . "', imagen='" . $this->imagen . "', descripcion='" . $this->descripcion . "', minJugadores='" . $this->minJugadores . "', maxJugadores='" . $this->maxJugadores .
            "' WHERE id_juego= $this->idJuego";


        $resp = parent::nonQuery($query);

        if ($resp >= 1) {

            return $resp;
        } else {

            return 0;
        }
    }


    public function delete($json)
    {

        $_respuesta = new Response();
        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            // No existe el token

            return $_respuesta->error_401();
        } else {

            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {


                if (!isset($datos["id_juego"])) {
                    // Si faltan datos

                    return $_respuesta->error_400();
                } else {
                    // Todo esta bien

                    if (isset($datos['id_juego'])) {
                        $this->idJuego = $datos['id_juego'];
                    }

                    // if(isset($datos['maxJugadores'])) {$this->maxJugadores = $datos['maxJugadores'] ;} // Para evitar errores

                    $resp = $this->eliminarJuego();

                    if ($resp) {

                        $respuesta = $_respuesta->response;
                        $respuesta["result"] = array(
                            "id_juego" => $this->idJuego
                        );

                        return $respuesta;
                    } else {

                        $_respuesta->error_500("Error interno, no hemos podido insertar el juego");
                    }
                }
            } else {

                return $_respuesta->error_401("El token que envió es inválido o ha caducado");
            }
        }
    }


    private function eliminarJuego()
    {

        $query = "DELETE FROM " . $this->tabla . " WHERE id_juego= $this->idJuego";

        $resp = parent::nonQuery($query);

        if ($resp >= 1) {

            return $resp;
        } else {

            return 0;
        }
    }

    private function buscarToken()
    {

        // $query = "SELECT id_token,id_usuario,estado FROM usuarios_token WHERE token=$this->token AND estado='Activo'" ;
        $query = "SELECT id_token, id_usuario, estado FROM usuarios_token WHERE token='$this->token' AND estado='Activo'";


        $resp = parent::obtenerDatos($query);

        if ($resp) {
            return $resp;
        } else {
            return 0;
        }
    }

    private function actualizarToken($idToken)
    {

        $date = date("Y-m-d H:i"); // Obtener fecha actual

        $query = "UPDATE usuarios_token" . " SET fecha = '$date' WHERE id_token = $idToken";

        $resp = parent::nonQuery($query);

        if ($resp >= 1) {

            return $resp;
        } else {

            return 0;
        }
    }
}
