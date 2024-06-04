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

    <div class="container">

        <nav id="areaJuego" class="navbar bg-body-tertiary px-3 mb-3">
            <a class="navbar-brand pe-none" href="#">Navbar</a>
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link bg" href="#scrollspyHeading1"> PARTIDA </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading2"> Tutorial </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
                  <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
                </ul>
              </li>
            </ul>
          </nav>
          <div data-bs-spy="scroll" data-bs-target="#areaJuego" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-image p-3 rounded-2" tabindex="0" style="background-image: url('VISTA/img/mesa_roja.jpg');">
            <section id="scrollspyHeading1">
                <p>...</p>
                <h1 class="text-center"> Área de juego </h1>
            </section>
            <h2 id="scrollspyHeading2" class="text-end me-5"> Tutorial </h2>
            <p>...</p>
            <h2 id="scrollspyHeading3" class="text-end me-5">Third heading</h2>
            <p>...</p>
            <h2 id="scrollspyHeading4" class="text-end me-5">Fourth heading</h2>
            <p>...</p>
            <h2 id="scrollspyHeading5" class="text-end me-5">Fifth heading</h2>
            <p>...</p>
          </div>

    </div>

</main>