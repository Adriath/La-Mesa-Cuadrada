
function enviarFormularioRegistro() {
    
    $('#botonEnviarRegistro').click(function () {
        $('#formRegistro').submit();

            // $.ajax({
            //     url: $(this).attr('action'), // URL del formulario
            //     method: $(this).attr('method'), // Método del formulario (POST en este caso)
            //     data: $(this).serialize(), // Serializar los datos del formulario
            //     // ... (resto de las opciones de $.ajax())
            //     success: function(response) { // Función que se ejecuta si la solicitud es exitosa
            //         // Manejar la respuesta del servidor (por ejemplo, mostrar un mensaje)
            //         console.log(response);
            //     },
            //     error: function(xhr, status, error) { // Función que se ejecuta si hay un error
            //         // Manejar el error (por ejemplo, mostrar un mensaje de error)
            //         console.error(error);
            //     }
            // });
        
    });
    
}

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