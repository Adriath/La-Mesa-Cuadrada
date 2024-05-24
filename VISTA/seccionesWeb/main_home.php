

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
                        <h5 class="card-title"> ¿Quieres guardar tu progreso? </h5>
                        <p class="card-text"> 
                            Deja de perder tus partidas.
                            <br><br>
                            Regístrate en menos de un minutos para poder jugar
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

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="basic-url" class="form-label">Your vanity URL</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                                            </div>
                                            <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-text">.00</span>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-text">With textarea</span>
                                            <textarea class="form-control" aria-label="With textarea"></textarea>
                                        </div>

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

                <form class="d-flex" method="get" action="#">
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
                    <a class="col-4 link-danger" href="index.php?pagina=buscador">
                        <h3 class="mt-5 prueba"> Ir al buscador </h3>
                    </a>
                </div>

                <p class="mt-5 areaPruebas">
                    <!-- ÁREA DE PRUEBAS DE BUSCADOR -->
                </p>
            </div>

            

        </div>

    </div>


</main>
