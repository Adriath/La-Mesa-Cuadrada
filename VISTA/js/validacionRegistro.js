
let nombreUsuarioValido = false ;
let emailValido = false ;
let passwordValido = false ;
let passwordRepetirValido = false ;

let nombreUsuarioYaExiste = false ;
let emailYaExiste = false ;

let formularioValido = false ;

// Envío del formulario de registro al hacer click en el botón "Enviar"

function enviarFormularioRegistro() {

    
    $('#botonEnviarRegistro').click(function () {

            
        if (formularioValido){

            $('#formRegistro').submit();
        }
        else
        {
            $("#errorFormRegistro").text("REVISA EL FORMULARIO");
        }


        

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

    // -------------- EVENTOS -----------------

    // VALIDACIONES CON BBDD


    // Evento para comprobar si el nombre de usuario introducido ya existe

    $('#nombreUsuario').keyup(function () {

        $.ajax({

            url: `http://localhost/La_Mesa_Cuadrada/MODELO/Modelo.php?usuarios`,
            method: 'GET',
            dataType: 'json',

            success: function (response) {


                console.log("ESTOY DENTRO DEL SUCCESS");

                // Manejar la respuesta del servidor
                console.log('Datos recibidos:', response);

                // Por ejemplo, mostrar los datos en algún lugar de tu página
                // Aquí asumo que tienes un elemento con id="datos" donde deseas mostrar los datos


                nombreUsuarioYaExiste = compruebaNombreUsuario(response);
                nombreUsuarioValido = validarNombreUsuario();
                validarFormulario();

            },
            error: function (xhr, status, error) {
                // Manejar cualquier error que ocurra durante la solicitud
                console.error('Error al obtener los datos:', error);
            }
        });
    });

    // Evento para comprobar si el email introducido ya existe
    $('#emailSesion').keyup(function () {

        $.ajax({

            url: `http://localhost/La_Mesa_Cuadrada/MODELO/Modelo.php?usuarios`,
            method: 'GET',
            dataType: 'json',

            success: function (response) {


                console.log("ESTOY DENTRO DEL SUCCESS");

                // Manejar la respuesta del servidor
                console.log('Datos recibidos:', response);

                // Por ejemplo, mostrar los datos en algún lugar de tu página
                // Aquí asumo que tienes un elemento con id="datos" donde deseas mostrar los datos


                emailYaExiste = compruebaUsuario(response);
                emailValido = validarEmail();
                validarFormulario();
                

            },
            error: function (xhr, status, error) {
                // Manejar cualquier error que ocurra durante la solicitud
                console.error('Error al obtener los datos:', error);
            }
        });
    });



// VALIDACIONES DE FORMATO



$('#passwordSesion').keyup(function () {

    passwordValido = validarPassword();
})

$(document).ready(function() {
    $('#listaErroresPassword').hide(); // Oculta la lista al cargar la página
});

$('#passwordRepetidoSesion').keyup(function () {

    passwordRepetirValido = validarRepetirPassword() ;
})

// $('#nombreUsuario, #emailSesion, #passwordSesion, #passwordRepetidoSesion').on('keyup', validarFormulario) ;


// -------------- MÉTODOS AUXILIARES -----------------


// Comprueba nombre de usuario

function compruebaNombreUsuario(datos) {

    let valido = false ;

    let nombreInput = $('#nombreUsuario').val(); // Obtenemos el nombre de usuario introducido por el usuario
    nombreInput = nombreInput.trim();
    nombreInput = nombreInput.toLowerCase();
    nombreInput = nombreInput.normalize('NFD').replace(/[\u0300-\u036f]/g, ""); // Normalizar y eliminar acentos

    let usuarioEncontrado = datos.find(usuario => usuario.nombreUsuario.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase() === nombreInput); // Buscamos el usuario en el array de usuarios ignorando tildes

    if (usuarioEncontrado) {
        // console.log("El usuario existe");
        $('#nombreUsuarioError').text("El nombre de usuario ya existe");
        $('#nombreUsuario').addClass('is-invalid');
        // $('#nombreUsuario').focus() ;

        valido = false ;
    }
    else {
        // console.log("El usuario no existe");
        $('#nombreUsuarioError').empty();
        // $('#nombreUsuario').removeClass('is-invalid');
        valido = true ;
    }

    return valido ;
}


// Comprueba email

function compruebaUsuario(datos) {

    let valido = false ;

    let emailInput = $('#emailSesion').val(); // Obtenemos el email introducido por el usuario
    emailInput = emailInput.trim();
    emailInput = emailInput.toLowerCase();

    let usuarioEncontrado = datos.find(usuario => usuario.email === emailInput); // Buscamos el usuario en el array de usuarios

    if (usuarioEncontrado) {
        // console.log("El usuario existe");
        $('#emailSesionError').text("El usuario ya existe");
        $('#emailSesion').addClass('is-invalid');
        // $('#emailSesion').focus() ;

        valido = false ;

    }
    else {
        // console.log("El usuario no existe");
        $('#emailSesionError').empty();
        // $('#emailSesion').removeClass('is-invalid');

        valido = true ;
    }

    return valido ;
}

// Comprueba formato de nombre de usuario

function validarNombreUsuario() {

    let valido = false;
    const limiteCaracteres = 80;
    const dobleEspacio = /  /g; // No se permiten dos espacios seguidos


    if ($('#nombreUsuario').val().trim().length === 0) // Si está vacío
    {
        $('#nombreUsuarioHelp').addClass('text-danger').text("El nombre de usuario no puede estar vacío");
        $('#nombreUsuario').addClass('is-invalid');
        // $('#nombreUsuario').focus() ;

        valido = false;
    }
    else // Si no está vacío
    {
        if ($('#nombreUsuario').val().length > limiteCaracteres) {
            $('#nombreUsuarioHelp').addClass('text-danger').text("El nombre de usuario no puede superar los 50 caracteres");
            $('#nombreUsuario').addClass('is-invalid');
            // $('#nombreUsuario').focus() ;

            valido = false;
        }
        else if ($('#nombreUsuario').val().match(dobleEspacio)) {
            $('#nombreUsuarioHelp').addClass('text-danger').text("No se permiten dos espacios seguidos");
            $('#nombreUsuario').addClass('is-invalid');
            // $('#nombreUsuario').focus() ;

            valido = false;
        }
        else {
            $('#nombreUsuarioHelp').removeClass('text-danger').text("Obligatorio");
            $('#nombreUsuario').removeClass('is-invalid');

            $('#nombreUsuario').addClass('is-valid');
            

            valido = true;
        }

    }

    return valido ;
}


// Comprueba formato de email

function validarEmail() {

    let valido = false;
    const  regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // La expresión regular del correo electrónico

    if ($('#emailSesion').val().trim().length === 0) // Si está vacío
    {
        $('#emailSesionHelp').addClass('text-danger').text("El email no puede estar vacío");
        $('#emailSesion').addClass('is-invalid');
        // $('#emailSesion').focus() ;

        valido = false;
    }
    else // Si no está vacío
    {

        if (!regexEmail.test($('#emailSesion').val())) {
            $('#emailSesionHelp').addClass('text-danger').text("Formato de email incorrecto");
            $('#emailSesion').addClass('is-invalid');
            // $('#emailSesion').focus() ;

            valido = false;
        }
        else 
        {
            $('#emailSesionHelp').removeClass('text-danger').text("Obligatorio");
            $('#emailSesion').removeClass('is-invalid');

            $('#emailSesion').addClass('is-valid');

            valido = true;
        }

    }

    return valido ;
}


// Comprueba formato de password


function validarPassword() {

    let valido = false;

    let min8CaracteresValido = false ;
    let max15CaracteresValido = false ;
    let contieneMayusculaValido = false ;
    let contieneMinusculaValido = false ;
    let contieneDigitoValido = false ;
    let noContieneEspaciosValido = false ;
    let contieneCaracterEspecialValido = false ;
    
    const min8Caracteres = /^.{8,}$/ ; // Mínimo 8 caracteres
    const max15Caracteres = /^.{8,15}$/ ; // Máximo 15 caracteres
    const contieneMayuscula = /[A-Z]/ ; // Debe contener al menos una mayúscula
    const contieneMinuscula = /[a-z]/ ; // Debe contener al menos una minúscula
    const contieneDigito = /\d/ ; // Debe contener al menos un dígito
    const noContieneEspacios = /^\S+$/ ; // No debe contener espacios
    const contieneCaracterEspecial = /[¡!@#$%^&*(),.¿?":{}|<>_/\\\'\'ºª·€¬=\[\]\+\-";]/ ; // Debe contener al menos un carácter especial ; // Debe contener al menos un carácter especial

    if ($('#passwordSesion').val().trim().length === 0) // Si está vacío
    {
        $('#listaErroresPassword').hide() ; // Oculto la lista de errores
        $('#passwordSesionHelp').addClass('text-danger').text("La contraseña no puede estar vacía");
        $('#passwordSesion').addClass('is-invalid');
        // $('#passwordSesion').focus() ;

        valido = false;
    }
    else // Si no está vacío
    {

        $('#listaErroresPassword').show() ;
        $('#passwordSesionHelp').removeClass('text-danger').text("Obligatorio");

        if (!min8Caracteres.test($('#passwordSesion').val())) // Si no cumple con el mínimo de caracteres
        {
            $('#min8Caracteres').removeClass('text-success').addClass('text-danger') ;
            $('#min8Caracteres').find('i.bi-check-circle').remove();
            $('#min8Caracteres').find('i.bi-exclamation-circle').remove();
            $('#min8Caracteres').prepend('<i class="bi bi-exclamation-circle"></i> ');

            $('#passwordSesion').addClass('is-invalid');

            // $('#passwordSesion').focus() ;

            min8CaracteresValido = false ;
            valido = false;
        }
        else // Si es correcto ponlo en verde
        {
            $('#min8Caracteres').removeClass('text-danger').addClass('text-success') ;
            $('#min8Caracteres').find('i.bi-exclamation-circle').remove();
            $('#min8Caracteres').find('i.bi-check-circle').remove();
            $('#min8Caracteres').prepend('<i class="bi bi-check-circle"></i> ');

            min8CaracteresValido = true ;
        }
        
        if (!max15Caracteres.test($('#passwordSesion').val())) // Si no cumple con el máximo de caracteres
        {
            $('#max15Caracteres').removeClass('text-success').addClass('text-danger') ;
            $('#max15Caracteres').find('i.bi-check-circle').remove();
            $('#max15Caracteres').find('i.bi-exclamation-circle').remove();
            $('#max15Caracteres').prepend('<i class="bi bi-exclamation-circle"></i> ');
            
            $('#passwordSesion').addClass('is-invalid');

            // $('#passwordSesion').focus() ;

            max15CaracteresValido = false ;
            valido = false;
        }
        else
        {
            $('#max15Caracteres').removeClass('text-danger').addClass('text-success') ;
            $('#max15Caracteres').find('i.bi-exclamation-circle').remove();
            $('#max15Caracteres').find('i.bi-check-circle').remove();
            $('#max15Caracteres').prepend('<i class="bi bi-check-circle"></i> ');

            max15CaracteresValido = true ;
        }

        if (!contieneMayuscula.test($('#passwordSesion').val())) // Si no cumple con la mayúscula
        {
            $('#contieneMayuscula').removeClass('text-success').addClass('text-danger') ;
            $('#contieneMayuscula').find('i.bi-check-circle').remove();
            $('#contieneMayuscula').find('i.bi-exclamation-circle').remove();
            $('#contieneMayuscula').prepend('<i class="bi bi-exclamation-circle"></i> ');

            $('#passwordSesion').addClass('is-invalid');

            // $('#passwordSesion').focus() ;

            contieneMayusculaValido = false ;
            valido = false;
        }
        else
        {
            $('#contieneMayuscula').removeClass('text-danger').addClass('text-success') ;
            $('#contieneMayuscula').find('i.bi-exclamation-circle').remove();
            $('#contieneMayuscula').find('i.bi-check-circle').remove();
            $('#contieneMayuscula').prepend('<i class="bi bi-check-circle"></i> ');

            contieneMayusculaValido = true ;
        }

         if (!contieneMinuscula.test($('#passwordSesion').val())) // Si no cumple con la minúscula
        {
            $('#contieneMinuscula').removeClass('text-success').addClass('text-danger') ;
            $('#contieneMinuscula').find('i.bi-check-circle').remove();
            $('#contieneMinuscula').find('i.bi-exclamation-circle').remove();
            $('#contieneMinuscula').prepend('<i class="bi bi-exclamation-circle"></i> ');

            $('#passwordSesion').addClass('is-invalid');

            // $('#passwordSesion').focus() ;

            contieneMinusculaValido = false ;
            valido = false;
        }
        else
        {
            $('#contieneMinuscula').removeClass('text-danger').addClass('text-success') ;
            $('#contieneMinuscula').find('i.bi-exclamation-circle').remove();
            $('#contieneMinuscula').find('i.bi-check-circle').remove();
            $('#contieneMinuscula').prepend('<i class="bi bi-check-circle"></i> ');

            contieneMinusculaValido = true ;
        }

        if (!contieneDigito.test($('#passwordSesion').val())) // Si no cumple con el dígito
        {
            $('#contieneDigito').removeClass('text-success').addClass('text-danger') ;
            $('#contieneDigito').find('i.bi-check-circle').remove();
            $('#contieneDigito').find('i.bi-exclamation-circle').remove();
            $('#contieneDigito').prepend('<i class="bi bi-exclamation-circle"></i> ');

            $('#passwordSesion').addClass('is-invalid');

            // $('#passwordSesion').focus() ;

            contieneDigitoValido = false ;
            valido = false;
        }
        else
        {
            $('#contieneDigito').removeClass('text-danger').addClass('text-success') ;
            $('#contieneDigito').find('i.bi-exclamation-circle').remove();
            $('#contieneDigito').find('i.bi-check-circle').remove();
            $('#contieneDigito').prepend('<i class="bi bi-check-circle"></i> ');

            contieneDigitoValido = true ;
        }

        if (!noContieneEspacios.test($('#passwordSesion').val())) // Si contiene espacios
        {
            $('#noContieneEspacios').removeClass('text-success').addClass('text-danger') ;
            $('#noContieneEspacios').find('i.bi-check-circle').remove();
            $('#noContieneEspacios').find('i.bi-exclamation-circle').remove();
            $('#noContieneEspacios').prepend('<i class="bi bi-exclamation-circle"></i> ');

            $('#passwordSesion').addClass('is-invalid');

            // $('#passwordSesion').focus() ;

            noContieneEspaciosValido = false ;
            valido = false;
        }
        else
        {
            $('#noContieneEspacios').removeClass('text-danger').addClass('text-success') ;
            $('#noContieneEspacios').find('i.bi-exclamation-circle').remove();
            $('#noContieneEspacios').find('i.bi-check-circle').remove();
            $('#noContieneEspacios').prepend('<i class="bi bi-check-circle"></i> ');

            noContieneEspaciosValido = true ;
        }

        if (!contieneCaracterEspecial.test($('#passwordSesion').val())) // Si no cumple con el carácter especial
        {
            $('#contieneCaracterEspecial').removeClass('text-success').addClass('text-danger') ;
            $('#contieneCaracterEspecial').find('i.bi-check-circle').remove();
            $('#contieneCaracterEspecial').find('i.bi-exclamation-circle').remove();
            $('#contieneCaracterEspecial').prepend('<i class="bi bi-exclamation-circle"></i> ');

            $('#passwordSesion').addClass('is-invalid');

            // $('#passwordSesion').focus() ;

            contieneCaracterEspecialValido = false ;
            valido = false;
        }
        else
        {
            $('#contieneCaracterEspecial').removeClass('text-danger').addClass('text-success') ;
            $('#contieneCaracterEspecial').find('i.bi-exclamation-circle').remove();
            $('#contieneCaracterEspecial').find('i.bi-check-circle').remove();
            $('#contieneCaracterEspecial').prepend('<i class="bi bi-check-circle"></i> ');

            contieneCaracterEspecialValido = true ;
        }
        
        if (min8CaracteresValido && max15CaracteresValido && contieneMayusculaValido && contieneMinusculaValido && contieneDigitoValido && noContieneEspaciosValido && contieneCaracterEspecialValido)
            // Si todos los requisitos de la contraseña son válidos
        { 
            $('#passwordSesionHelp').removeClass('text-danger').text("Obligatorio");
            $('#listaErroresPassword').hide();
            $('#passwordSesion').removeClass('is-invalid');

            $('#passwordSesion').addClass('is-valid');

            valido = true;
        }

    }

    return valido ;
}

// Comprueba si la repetición de la contraseña coincide

function validarRepetirPassword() {

    let valido = false;
    
    if ($('#passwordRepetidoSesion').val().trim().length === 0) // Si está vacío
    {
        $('#passwordRepetidoSesionHelp').addClass('text-danger').text("El campo no puede estar vacío");
        $('#passwordRepetidoSesion').addClass('is-invalid');

        // $('#passwordRepetidoSesion').focus() ;

        valido = false;
    }
    else // Si no está vacío
    {

        if (!passwordValido)
        {
            $('#passwordRepetidoSesionHelp').addClass('text-danger').text("La contraseña aún no es válida") ;
            $('#passwordRepetidoSesion').addClass('is-invalid');
        }
        else if ($('#passwordRepetidoSesion').val() != $('#passwordSesion').val() && passwordValido) {
            $('#passwordRepetidoSesionHelp').addClass('text-danger').text("La contraseña no coincide") ;

            $('#passwordRepetidoSesion').addClass('is-invalid');

            // $('#passwordRepetidoSesion').focus() ;

            valido = false;
        }
        else 
        {
            $('#passwordRepetidoSesionHelp').removeClass('text-danger').text("Obligatorio");
            $('#passwordRepetidoSesion').removeClass('is-invalid');

            $('#passwordRepetidoSesion').addClass('is-valid');

            valido = true;
        }

    }

    return valido ;
}


// Comprueba si todos los campos del formulario son válidos

function validarFormulario() {

     // Verifica el estado de todas las validaciones

     nombreUsuarioValido = validarNombreUsuario();
     emailValido = validarEmail();
     passwordValido = validarPassword();
     passwordRepetirValido = validarRepetirPassword();
    
    
    if (nombreUsuarioValido && emailValido && passwordValido && passwordRepetirValido && nombreUsuarioYaExiste && emailYaExiste)
    {
        $('#errorFormRegistro').empty() ;
        
        formularioValido = true ;
    }
    else
    {
        $('#errorFormRegistro').text("Hay errores en el formulario") ;

        formularioValido = false ;
    }

}


function comenzar() {

    
}

window.addEventListener("load", comenzar, false);