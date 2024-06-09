
// Envío del formulario de registro al hacer click en el botón "Enviar"

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


    // -------------- EVENTOS -----------------


    // Evento para comprobar si el nombre de usuario introducido ya existe

    $('#nombreUsuario').keyup(function () {
     
        $.ajax({

            url: `http://localhost/La_Mesa_Cuadrada/MODELO/Modelo.php?usuarios`,
            method: 'GET',
            dataType: 'json',
    
            success: function (response) {
    
    
                console.log("ESTOY DENTRO DEL SUCCESS") ;
                
                // Manejar la respuesta del servidor
                console.log('Datos recibidos:', response) ;
    
                // Por ejemplo, mostrar los datos en algún lugar de tu página
                // Aquí asumo que tienes un elemento con id="datos" donde deseas mostrar los datos
                
                                
                compruebaNombreUsuario(response) ;
                
            },
            error: function (xhr, status, error) {
                // Manejar cualquier error que ocurra durante la solicitud
                console.error('Error al obtener los datos:', error);
            }
        });
    }) ;

    // Evento para comprobar si el email introducido ya existe
    $('#emailSesion').keyup(function () {
     
        $.ajax({

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


// -------------- MÉTODOS AUXILIARES -----------------

function compruebaNombreUsuario(datos) {
    
    let nombreInput = $('#nombreUsuario').val() ; // Obtenemos el nombre de usuario introducido por el usuario
    nombreInput = nombreInput.trim() ;
    nombreInput = nombreInput.toLowerCase() ;
    
    let usuarioEncontrado = datos.find(usuario => usuario.nombreUsuario === nombreInput) ; // Buscamos el usuario en el array de usuarios

    if (usuarioEncontrado) {
        // console.log("El usuario existe");
        $('#nombreUsuarioHelp').addClass('text-danger').text("El nombre de usuario ya existe");
        
    } 
    else {
        // console.log("El usuario no existe");
        $('#nombreUsuarioHelp').removeClass('text-danger').text("Obligatorio");
    }
}

function compruebaUsuario(datos) {
    
    let emailInput = $('#emailSesion').val() ; // Obtenemos el email introducido por el usuario
    emailInput = emailInput.trim() ;
    emailInput = emailInput.toLowerCase() ;

    let usuarioEncontrado = datos.find(usuario => usuario.email === emailInput) ; // Buscamos el usuario en el array de usuarios

    if (usuarioEncontrado) {
        // console.log("El usuario existe");
        $('#emailSesionHelp').addClass('text-danger').text("El usuario ya existe");
        
    } 
    else {
        // console.log("El usuario no existe");
        $('#emailSesionHelp').removeClass('text-danger').text("Obligatorio");
    }
}


function comenzar() {

    enviarFormularioRegistro();
}

window.addEventListener("load", comenzar, false);