<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/MODELO/BBDD.php" ;
require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/CONTROL/class/Juego.php" ;

class ModeloJuego extends BBDD {



    public static function obtenerJuego($enlace) {

        $_conexion = new BBDD() ; // Creamos el objeto conexión

        $conexion = $_conexion->getConexion() ;

        // Conectamos con la base de datos

        $stmt = $conexion->prepare("SELECT * FROM juego WHERE enlace = ?") ;
        $stmt->bind_param("s", $enlace) ;
        $stmt->execute() ;
        $result = $stmt->get_result() ;

        if ($result->num_rows > 0) // Si hay resultados
        {
            $juegoData = $result->fetch_assoc(); // Obtener los datos como un array asociativo

            // Crear un objeto Usuario
            $juegoObjeto = new Juego(
                $juegoData['id_juego'],
                $juegoData['nombre'],
                $juegoData['enlace'],
                $juegoData['imagen'],
                $juegoData['descripcion'],
                $juegoData['minJugadores'],
                $juegoData['maxJugadores'],
                $juegoData['tutorial'],

            );

            // Devuelve el objeto en un array
            return $juegoObjeto ;
        }
    }

}