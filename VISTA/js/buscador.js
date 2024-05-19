
/* Aquí se implementan las funciones relacionadas con el buscador */

$(document).ready(function (){

    let textoUsuario = "" ;

    // Hacer la solicitud AJAX para obtener los datos
    $.ajax({

        url: `http://localhost/La_Mesa_Cuadrada/MODELO/JSON/prueba.json`,
        method: 'GET',
        dataType: 'json',

        success: function (response) {
            // Manejar la respuesta del servidor
            console.log('Datos recibidos:', response) ;

            // Por ejemplo, mostrar los datos en algún lugar de tu página
            // Aquí asumo que tienes un elemento con id="datos" donde deseas mostrar los datos
            $('#buscador').keyup(function () {
                
                textoUsuario = document.getElementById("buscador").value ;
                console.log("textoUsuario: " + textoUsuario) ;
                haceAlgo(response) ;
            })
            
            $('#botonBuscar').click(function (event) {
                event.preventDefault();

                haceOtraCosa(response, textoUsuario) ;
            });
        },
        error: function (xhr, status, error) {
            // Manejar cualquier error que ocurra durante la solicitud
            console.error('Error al obtener los datos:', error);
        }
    });
});

// ESTO VALDRÁ PARA LAS SUGERENCIAS

/* Cómo funciona:
    Al carcar el documento, mediante al Ajax se carga al json de prueba. A través de un escuchador de pulsación 
    hace algo. Ese algo será la comprobación de lo escrito con lo que hay en el json.*/

function haceAlgo(datos) {
    
    console.log("Estoy dentro del Ajax") ;

}

function haceOtraCosa(datos, textoUsuario) {

    let coincidenciaEncontrada = false;
    
    for (const categoria in datos) { // Itera sobre las categorías
        if (datos.hasOwnProperty(categoria)) {
            console.log(`Comparando: ${categoria.toLowerCase()} con ${textoUsuario.toLowerCase()}`);
            if (categoria.toLowerCase().includes(textoUsuario.toLowerCase())) {
                console.log("Coincidencia encontrada en la categoría: " + categoria);
                coincidenciaEncontrada = true;
                break; // Salir del bucle si se encuentra una coincidencia
            }
        }
    }

    if (!coincidenciaEncontrada) {
        console.log("No hay coincidencias");
    }
       
    
    $(".areaPruebas").html("Lo que ha introducido el usuario: " + textoUsuario) ;

    // document.getElementsByClassName("areaPruebas")[0].innerHTML = "Lo que ha introducido el usuario: " + textoUsuario ;
}


// AHORA VOY A PROGRAMA EL COMPORTAMIENTO A PARTIR DEL BOTÓN SUBMIT

/* Con esta parte consigo que al hacer clic en el botón de enviar pase algo.
    En este caso solamente sale un mensaje en un <p> dentro del home. */

// $('#botonBuscar').click(function (event) {
//     event.preventDefault();

//     let textoUsuario = document.getElementById("buscador").value ;

//     document.getElementsByClassName("areaPruebas")[0].innerHTML = "Lo que ha introducido el usuario: " + textoUsuario ;
// });


function comenzar() {
    
}

window.addEventListener("load", comenzar, false);