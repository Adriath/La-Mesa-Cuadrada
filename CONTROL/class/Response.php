<?php

class Response {

    public $response = [
        'status' => "ok",
        'result' => array()
    ];

    // 200
    
    public function error_200($string = "Datos incorrectos") { // Envío correcto pero datos erróneos

        $this->response['status'] = "error" ;
        $this->response['result'] = array(
            "error_id" => "200",
            "error_msg" => $string
        ) ;

        return $this->response ;
    }

    // 400

    public function error_405() { // Envío por método no permitido

        $this->response['status'] = "error" ;
        $this->response['result'] = array(
            "error_id" => "405",
            "error_msg" => "Metodo no permitido"
        ) ;

        return $this->response ;
    }


    public function error_400() { // Datos enviados incorrectos

        $this->response['status'] = "error" ;
        $this->response['result'] = array(
            "error_id" => "400",
            "error_msg" => "Datos enviados incompletos o con formato incorrecto"
        ) ;

        return $this->response ;
    }


    public function error_404() { // Recurso no encontrado

        $this->response['status'] = "error" ;
        $this->response['result'] = array(
            "error_id" => "404",
            "error_msg" => "El servidor no puede encontrar el recurso solicitado"
        ) ;

        return $this->response ;
    }


    // 500

    public function error_500($string = "Error interno del servidor") { // Error interno del servidor

        $this->response['status'] = "error" ;
        $this->response['result'] = array(
            "error_id" => "500",
            "error_msg" => $string
        ) ;

        return $this->response ;
    }
}