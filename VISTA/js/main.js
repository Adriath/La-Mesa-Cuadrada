

function desaparecePlaceholder() {
    
    $('#buscador').focus(function () {
        $(this).attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', 'ㄟ( ▔, ▔ )ㄏ');
    });
}

function animacionBuscador() {
    $(document).ready(function() {
        $("#tituloBuscador").addClass("show"); // Animación para el título
        $("#buscador").addClass("show"); // Animación para la barra
    });

}

function comenzar() {

    desaparecePlaceholder();
    animacionBuscador() ;
    enviarFormularioRegistro();
}

window.addEventListener("load", comenzar, false);