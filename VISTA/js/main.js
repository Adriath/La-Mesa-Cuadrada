
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

    $('#emailSesion').keyup(function () {
     
        $.ajax({

            // url: `http://localhost/La_Mesa_Cuadrada/MODELO/Modelo.php?page=1`,
            url: `http://localhost/La_Mesa_Cuadrada/MODELO/Modelo.php?usuarios`,
            method: 'GET',
            dataType: 'json',
    
            success: function (response) {
    
    
                console.log("ESTOY DENTRO DEL SUCCESS") ;
                
                // Manejar la respuesta del servidor
                console.log('Datos recibidos:', response) ;
    
                // Por ejemplo, mostrar los datos en algún lugar de tu página
                // Aquí asumo que tienes un elemento con id="datos" donde deseas mostrar los datos
                
                                
                compruebaUsuario(response) ;
                
            },
            error: function (xhr, status, error) {
                // Manejar cualquier error que ocurra durante la solicitud
                console.error('Error al obtener los datos:', error);
            }
        });
    }) ;
    
}


function compruebaUsuario(datos) {
    
    console.log("Estoy dentro de compruebaUsuaruio()") ;
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