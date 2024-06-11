
<!-- FOOTER -->

<div class="container">

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">

        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="text-danger"> © 2024 Adrián Arjona</span>
        </div>

        <ul class="nav col-md-4 list-unstyled align-items-center flex-column">
            <li class="ms-3">
                <a class="text-muted" href="#">
                    Aviso legal
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#">
                    Política de Cookies
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#">
                    Política de privacidad
                </a>
            </li>
        </ul>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-muted" href="#">
                    <i class="bi bi-facebook text-danger"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#">
                    <i class="bi bi-instagram text-danger"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#">
                    <i class="bi bi-twitter text-danger"></i>
                </a>
            </li>
        </ul>

    </footer>
</div>


<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src='VISTA/js/main.js'></script>
<script src='VISTA/js/buscador.js'></script>
<script src='VISTA/js/validacionRegistro.js'></script>
<script src='VISTA/js/validacionLogin.js'></script>

<?php

if (isset($_GET["pagina"])) {

    switch ($_GET["pagina"]) {

        case "tuki":

            echo "<script src='http://localhost/La_Mesa_Cuadrada/VISTA/js/juego/" . $_GET["pagina"] .".js'></script>" ;
            break;
    }
}

?>

</body>

</html>

