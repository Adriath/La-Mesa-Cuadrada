<!-- MIGAS DE PAN -->

<!-- Las migas de pan no aparecen en esta página porque es la principal -->

<!-- MAIN -->

<main>

    <div class="container">

        <div class="row">

            <!-- COLUMNA IZQUIERDA  / REGISTRO -->

            <div class="col-lg-6 border border-start-0 border-top-0 border-bottom-0 order-1 order-lg-0"> <!-- Aquí se controla el borde separador de ambas columnas -->

                <!-- Aquí va el registro -->

                <!-- Esto es una muestra. Lo que he utilizado es Image overlays de Bootstrap. Se requiere imagen vectorial para que quede bien en la versión móvil -->

                <div class="card text-bg-light">
                    <img src="VISTA/img/fondo_columnaIzquierda.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title mb-4"> ¿Quieres guardar tu progreso? </h5>
                        <p class="card-text">
                            Deja de perder el progreso de tus partidas.
                            <br><br>
                            Regístrate en menos de un minuto para poder jugar
                            <br>
                            torneos con amigos y llevar un registro de tus partidas.
                        </p>
                        <p class="card-text"><small> ¡Además es gratis! </small></p>

                        <!-- Botón de registro -> activa el modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#areaRegistro">
                            ¡Regístrate!
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="areaRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tituloAreaRegistro" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tituloAreaRegistro"> Área de registro </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- FORMULARIO DE REGISTRO -->

                                        <!-- De momento es un ejemplo. El botón de envío estará fuerad el formulario (ahora mismo no hay etiquetas form).
                                        El botón se puede asociar con JavaScript de manera sencilla aunque esté fuera de las etiquetas. -->

                                        <form id="formRegistro" action="CONTROL/route.php" method="POST">
                                            <!-- <div class="mb-3">
                                                <label for="emailSesion" class="form-label"> Nombre usuario </label>
                                                <input type="email" class="form-control" id="emailSesion" aria-describedby="emailHelp">
                                                <div id="emailSesionHelp" class="form-text"> Obligatorio </div>
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="emailSesion" class="form-label"> Email </label>
                                                <input type="email" class="form-control" id="emailSesion" aria-describedby="emailHelp" name="usuario">
                                                <div id="emailSesionHelp" class="form-text"> Obligatorio </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="passwordSesion" class="form-label"> Contraseña </label>
                                                <input type="password" class="form-control" id="passwordSesion" name="password">
                                                <div id="passwordSesionHelp" class="form-text"> Obligatoria </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
                                        <button type="button" id="botonEnviarRegistro" class="btn btn-danger"> Enviar </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-img-overlay mb-3 me-3 align-self-end text-end">
                        <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#areaInicioSesion">
                            Iniciar sesión
                        </button>
                        <h5 class="card-title"> ¿Ya tienes cuenta? </h5>
                        <p class="card-text">
                            Inicia sesión para jugar.
                        </p>

                        <!-- Modal -->
                        <div class="modal fade" id="areaInicioSesion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tituloAreaRegistro" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tituloAreaRegistro"> Área de INICIO DE SESIÓN </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- FORMULARIO DE REGISTRO -->

                                        <!-- De momento es un ejemplo. El botón de envío estará fuerad el formulario (ahora mismo no hay etiquetas form).
                                        El botón se puede asociar con JavaScript de manera sencilla aunque esté fuera de las etiquetas. -->

                                        <form action="">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
                                        <button type="button" class="btn btn-danger"> Enviar </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

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