<?php

require_once 'CONTROL/class/Usuario.php' ;

    // echo "Estoy dentro del POST del Registro.php." ;
    
    $usuario = new Usuario($_POST['usuario'], $_POST['password']) ;

    $listaUsuarios = $usuario->obtenerUsuario() ;
    
    // $usuario->jsonSerialize();

    // $json = json_encode($usuario);

    // $auth = new Authentication() ;
    // $auth->login($json);

    // echo "Usuario: " . $usuario->getUsuario() . " Password: " . $usuario->getPassword() ;
    
    // header("Location: auth.php") ;