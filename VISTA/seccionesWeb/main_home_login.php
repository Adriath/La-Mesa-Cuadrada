

<!-- MIGAS DE PAN -->

<!-- Las migas de pan no aparecen en esta página porque es la principal -->

<!-- MAIN -->

<?php

// if (isset($_SESSION["login"])) 
// {

//     if ($_SESSION["usuario"]){
        
        
//     }

//     echo "<button class='btn btn-light' type='submit'> <a href='logout' class='btn btn-light'> Cerrar sesión </a> </button>" ;
// }

?>

<main>

    <div class="container">

        <div class="row">

            <!-- COLUMNA IZQUIERDA  / REGISTRO -->

            <div class="col-lg-6 border border-start-0 border-top-0 border-bottom-0 order-1 order-lg-0"> <!-- Aquí se controla el borde separador de ambas columnas -->

                <h1> ESTO ES UNA PRUEBA. ESTOY EN EL HOME LOGADO </h1>
                <p> Nombre de usuario: <?= $usuario->getNombreUsuario() ?> </p>

                <button class='btn btn-light' type='submit'> <a href='logout' class='btn btn-light'> Cerrar sesión </a> </button>

            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

            <!-- COLUMNA DERECHA  / BUSCADOR -->

            <div class="col-lg-6 order-0 order-lg-0">

                <h1 id="tituloBuscador"> ¿A qué te apetece jugar hoy? </h1>

                <form class="d-flex" method="get" action="#" id="formBuscador">
                    <input class="form-control form-control-lg rounded-pill" id="buscador" type="search" placeholder="o(￣▽￣)/" aria-label="Buscar">
                    <button class="btn btn-outline-danger rounded-pill" id="botonBuscar" type="submit"> Buscar </button>
                </form>

                <!-- Lista de sugerencias -->

                <div class="list-group" id="sugerencias">
                    <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        The current link item
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                    <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a> -->
                </div>

                <!-- Ir al buscador (PRUEBAS)-->

                <div class="row">
                    <a class="col-4 link-danger" href="buscador">
                        <h3 class="mt-5"> Ir al buscador </h3>
                    </a>
                </div>

                <p class="mt-5 areaPruebas">
                    <!-- ÁREA DE PRUEBAS DE BUSCADOR -->
                </p>
            </div>



        </div>

    </div>


</main>