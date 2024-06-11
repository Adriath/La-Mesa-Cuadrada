<?php

function formularioJugadores() {

    // echo "El mínimo de jugadores es: " . $juego->getMinJugadores() ;
    // echo "El máximo de jugadores es: " . $juego->getMaxJugadores() ;
    
    $html = <<<HTML

<div class="col mt-3">
                    <h4 class="mb-3"> Nº máximo de jugadores </h4>


                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btnradio2"> 2 </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btnradio3"> 3 </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btnradio4"> 4 </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btnradio5"> 5 </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btnradio6"> 6 </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio7" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btnradio7"> 7 </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio8" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btnradio8"> 8 </label>
                    </div>
                </div>
HTML;

    return $html;
}

echo formularioJugadores() ;