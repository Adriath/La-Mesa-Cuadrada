<!-- MIGAS DE PAN -->


<nav style="--bs-breadcrumb-divider: '🔴';" aria-label="Migas de pan"> <!-- Insertar entre las comillas simples ('') el tipo de separador deseado -->
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="link-danger" href="home"> Home </a></li>
            <li class="breadcrumb-item active" aria-current="Página actual"> Área de Juego </li>
        </ol>
    </div>
</nav>

<!-- MAIN -->

<main>

    <div class="container-fluid">

        <nav id="areaJuego" class="navbar bg-body-terciary px-3 mb-3">
            <a class="navbar-brand pe-none display-2 mx-auto" href="#"> 
                <h1 class="display-2"> <?= $juego->getNombre() ?> </h1>
            </a>
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link partida bg-danger" href="#scrollspyHeading1"> PARTIDA </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-danger" href="#scrollspyHeading2"> Tutorial </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-danger" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> Mäs opciones </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#scrollspyHeading3"> Opción adicional </a></li>
                  <li><a class="dropdown-item" href="#scrollspyHeading4"> Opción adicional </a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#scrollspyHeading5"> Opción adicional </a></li>
                </ul>
              </li>
            </ul>
          </nav>
          <div data-bs-spy="scroll" data-bs-target="#areaJuego" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-image p-3 rounded-2" tabindex="0" style="background-image: url('VISTA/img/mesa_roja.jpg');">
            <section id="scrollspyHeading1">
                <p>...</p>
                <h1 class="text-center">

                <?php

                  require_once $_SERVER["DOCUMENT_ROOT"] . "/La_Mesa_Cuadrada/VISTA/seccionesWeb/juegos/". $_GET["pagina"] . "/". $_GET["pagina"] .".php" ;

                ?>

                </h1>
            </section>
            <h2 id="scrollspyHeading2" class="display-2 fw-bold text-center my-4 me-5"> Tutorial </h2>
            
            <?= $juego->getTutorial()  ?>

            <h2 id="scrollspyHeading3" class="display-2 fw-bold text-center my-4 me-5"> Opción adicional </h2>
            <p>...</p>
            <h2 id="scrollspyHeading4" class="display-2 fw-bold text-center my-4 me-5"> Opción adicional </h2>
            <p>...</p>
            <h2 id="scrollspyHeading5" class="display-2 fw-bold text-center my-4 me-5"> Opción adicional </h2>
            <p>...</p>
          </div>

    </div>

</main>