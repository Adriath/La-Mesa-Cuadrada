
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

        <!-- BARRA DE NAVEGACIÓN -->

        <nav class="navbar bg-body-tertiary">

            <div class="container">

                <!-- Logotipo -->

                <div class="text-center">
                    <a href="index.php?pagina=home">
                        <img class="img-fluid" src="VISTA/img/logo.png" width="150" alt="Logotipo La Mesa Cuadrada">
                    </a>
                    <P class="h5"> La Mesa Cuadrada </P>
                </div>

                <!-- Barra de búsqueda -->

                <div class="col-lg-6 order-0 order-lg-0">

                <h1 id="tituloBuscador"> ¿A qué te apetece jugar hoy? </h1>

                <form class="d-flex" method="get" action="#">
                    <input class="form-control form-control-lg rounded-pill" id="buscador" type="search" placeholder="o(￣▽￣)/" aria-label="Buscar">
                    <button class="btn btn-outline-danger rounded-pill" type="submit"> Buscar </button>
                </form>

            </div>

                <!-- Botón de Registro e Idioma para ESCRITORIO -->

                <div>
                    <ul class="list-unstyled">
                        <li>
                            <i class="bi bi-people">
                                <span class="d-none d-lg-inline"> Regístrate </span>
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