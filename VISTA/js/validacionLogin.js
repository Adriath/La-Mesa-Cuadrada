
// let nombreUsuarioValido = false;
// let emailValido = false;
// let passwordValido = false;
// let passwordRepetirValido = false;

let usuarioExiste = false;
let emailExiste = false;
let passwordExiste = false ;

let formularioLoginValido = false;


// -------------- EVENTOS -----------------

// Envío del formulario de login al hacer click en el botón "Enviar"

$('#botonEnviarLogin').click(function () {

    // formularioLoginValido = validarFormularioLogin() ;

    // if (formularioLoginValido){

    $('#formLogin').submit();
    // }
    // else
    // {
    //     $("#errorFormRegistro").text("CREDENCIALES INCORRECTAS");
    // }

});

// VALIDACIONES CON BBDD


// Evento para comprobar si el nombre de usuario introducido ya existe

$('#nombreUsuarioLogin').keyup(function () {

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

            usuarioExiste = compruebaNombreUsuarioLogin(response);
            console.log ("usuarioExiste: " + usuarioExiste); // Pruebas
            emailExiste = compruebaEmailLogin(response) ;
            console.log ("emailExiste: " + emailExiste); // Pruebas

        },
        error: function (xhr, status, error) {
            // Manejar cualquier error que ocurra durante la solicitud
            console.error('Error al obtener los datos:', error);
        }
    });
});

// Evento para comprobar si el email introducido ya existe
$('#passwordLogin').keyup(function () {

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


            passwordExiste = compruebaPasswordLogin(response);
            console.log ("passwordExiste: " + passwordExiste); // Pruebas
            // emailValido = validarEmail();


        },
        error: function (xhr, status, error) {
            // Manejar cualquier error que ocurra durante la solicitud
            console.error('Error al obtener los datos:', error);
        }
    });
});



function compruebaNombreUsuarioLogin(datos) {

    let nombreInput = $('#nombreUsuarioLogin').val().trim().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
    let usuarioEncontrado = datos.find(usuario => usuario.nombreUsuario.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase() === nombreInput);
    if (usuarioEncontrado) {
        // $('#nombreUsuarioLogin').text("El nombre de usuario ya existe");
        // $('#nombreUsuarioLogin').addClass('is-invalid');
        
        $valido = true ;

    } else {
        // $('#nombreUsuarioLogin').empty();
        
        $valido = false ;
    }

    return $valido ;
}

function compruebaEmailLogin(datos) {

    $valido = false ;

    let emailInput = $('#nombreUsuarioLogin').val().trim().toLowerCase();
    let emailEncontrado = datos.find(usuario => usuario.email.toLowerCase() === emailInput);
    if (emailEncontrado) {
        // $('#emailSesionError').text("El usuario ya existe");
        // $('#emailSesion').addClass('is-invalid');
        
        $valido = true ;
    } else {
        // $('#emailSesionError').empty();
        
        $valido = false ;
    }

    return $valido ;
}


// Comprueba email

function compruebaPasswordLogin(datos) {

    let valido = false;

    let passwordInput = $('#passwordLogin').val(); // Obtenemos el email introducido por el usuario
    // passwordInput = passwordInput.trim();
    // passwordInput = passwordInput.toLowerCase();

    let passwordEncontrada = datos.find(password => password.password === passwordInput); // Buscamos la contraseña en el array de usuarios

    if (passwordEncontrada) {
        console.log("El usuario existe");
        // $('#passwordLoginError').text("La contraseña ya existe");
        // $('#passwordLogin').addClass('is-invalid');
        // $('#emailSesion').focus() ;

        valido = true;

    }
    else {
        console.log("El usuario no existe");
        // $('#passwordLoginError').empty();
        // $('#emailSesion').removeClass('is-invalid');

        valido = false;
    }

    return valido;
}


function validarFormularioLogin() {
    
    $valido = false ;

    if ((usuarioExiste || emailExiste) && passwordExiste) {
        $('#errorFormLogin').empty();

        $valido = true ;
    }

    return $valido ;
}


// Comprueba si todos los campos del formulario son válidos

// function validarFormulario() {

//     // Verifica el estado de todas las validaciones

//     nombreUsuarioValido = validarNombreUsuario();
//     emailValido = validarEmail();
//     passwordValido = validarPassword();
//     passwordRepetirValido = validarRepetirPassword();


//     if (nombreUsuarioValido && emailValido && passwordValido && passwordRepetirValido && nombreUsuarioYaExiste && emailYaExiste) {
//         $('#errorFormRegistro').empty();

//         formularioValido = true;
//     }
//     else {
//         $('#errorFormRegistro').text("Hay errores en el formulario");

//         formularioValido = false;
//     }

// }


function comenzar() {


}

window.addEventListener("load", comenzar, false);