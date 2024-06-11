<?php

session_start() ;

?>


<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> La Mesa Cuadrada </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='VISTA/css/main.css'>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Iconos -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>

        <!-- HEADER -->
        

        <!-- BARRA DE NAVEGACIÓN -->

        <nav class="navbar bg-body-tertiary">

            <div class="container">

                <!-- Logotipo -->

                <div class="mx-auto text-center">
                    <a href="home">
                        <img class="img-fluid" src="VISTA/img/logo.png" width="150" alt="Logotipo La Mesa Cuadrada">
                    </a>
                    <P class="h5"> La Mesa Cuadrada </P>
                </div>

                <!-- Botón de Registro e Idioma para ESCRITORIO -->

                <div>
                    <ul class="list-unstyled">
                        <li>
                            <i class="bi bi-people">
                                
                            <?php

                                if (isset($_SESSION["login"])) {

                                    if (isset($_SESSION["usuario"])) {
                                        

                                        $usuario = $_SESSION["usuario"] ;

                                        echo '<span class="d-none d-lg-inline" data-bs-toggle="modal" data-bs-target="#areaRegistro"> Tu cuenta </span>' ;

                                    }
                                }
                                else
                                {
                                    echo '<span class="d-none d-lg-inline" data-bs-toggle="modal" data-bs-target="#areaRegistro"> Regístrate </span>' ;
                                }

                            ?>

                            </i> 
                        </li>
                        <li>
                            <i class="bi bi-globe-americas"> 
                                <span class="d-none d-lg-inline"> Idioma </span> 
                            </i>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
