
$(document).ready(function () {

    aniadirJugadores() ;
});

function aniadirJugadores() {
    
    $.ajax({
        url: "http://localhost/La_Mesa_Cuadrada/CONTROL/partida/tuki/aniadirJugadores.php", // Ruta al archivo PHP
        type: "GET",
        success: function(response) {
            $('#tapete').html(response); // Inserta el contenido HTML en el div
        },
        error: function() {
            alert("Error al cargar los jugadores.");
        }
    });
}