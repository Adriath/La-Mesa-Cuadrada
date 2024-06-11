
<section>
    
    <!-- <div class="container-fluid rounded-5 border border-5 border-warning bg-image img-fluid" style="background-image: url('http://localhost/La_Mesa_Cuadrada/VISTA/img/tapete_verde.png'); height: 325px; width: 100%; opacity: 0.8;">
        <div class="row"">

      

        

        </div>
    </div> -->

    <div class="container-fluid rounded-5 border border-5 border-warning position-relative" style="height: 325px; width: 100%;">
  <div class="bg-image position-absolute top-0 start-0 w-100 h-100" style="background-image: url('http://localhost/La_Mesa_Cuadrada/VISTA/img/tapete_verde.png'); background-size: cover; background-position: center; opacity: 0.9;"></div>
  <div class="position-relative" style="z-index: 1;">
    
  <h1> Nombre del juego = <?=$juego->getNombre()?> </h1>

<p> Descripción del juego = <?=$juego->getDescripcion()?></p>
<p> Máximo de jugaodres = <?=$juego->getMaxJugadores()?></p>


  </div>
</div>


</section>