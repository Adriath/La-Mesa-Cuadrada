
/* Aquí se implementan las funciones relacionadas con el buscador */
// -------------------------------------------------------------------

let textoUsuario = "" ;
let listaCoincidencias = [] ;

$(document).ready(function (){

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
                
                // textoUsuario = document.getElementById("buscador").value ;
                textoUsuario = $("#buscador").val() ;
                console.log("textoUsuario: " + textoUsuario) ;
                // haceAlgo(response) ;
                haceOtraCosa(response, textoUsuario) ;
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

           if (textoUsuario.trim() !== ""){

                if (categoria.toLowerCase().includes(textoUsuario.toLowerCase())) {
                    
                    console.log("Coincidencia encontrada en la categoría: " + categoria) ;
                    listaCoincidencias.push(categoria) ; // Guarda la coincidencia en el array
                    console.log("listaCoincidencias: " + listaCoincidencias) ;
                    coincidenciaEncontrada = true;
                    // break; // Salir del bucle si se encuentra una coincidencia
                }
           }
        }
    }

    if (coincidenciaEncontrada) {
        
        despliegaListaSugerencias(datos) ;
    }

    else if (!coincidenciaEncontrada) {
        limpiaListaSugerencias() ;
        console.log("No hay coincidencias") ;
        listaCoincidencias = [] ; // Limpia el array
        console.log("listaCoincidencias: " + listaCoincidencias) ;
    }
       
    // $(".areaPruebas").html("Lo que ha introducido el usuario: " + textoUsuario) ;
    
    // $(".areaPruebas").html("Lista de coincidencias: <br>") ;
    // listaCoincidencias.forEach(element => {
    //     $(".areaPruebas").append(element + "<br>") ;
    // });
    // listaCoincidencias = [] ; // Limpia el array

    // document.getElementsByClassName("areaPruebas")[0].innerHTML = "Lo que ha introducido el usuario: " + textoUsuario ;
}

function despliegaListaSugerencias(datos) {
    limpiaListaSugerencias();

    listaCoincidencias.forEach(element => {
        const json = datos[element];
        if (json && json[0] && json[0].enlace) {
            const linkItem = $('<a>', {
                href: "index.php?pagina=" + json[0].enlace,
                class: 'list-group-item list-group-item-action',
                text: element
            });
            
            // Agregar el elemento <a> al div con id "sugerencias"
            $('#sugerencias').append(linkItem);
        }
    });

    listaCoincidencias = []; // Limpia el array
}


function limpiaListaSugerencias() {
    
    const linkItem = ""

    $('#sugerencias').html(linkItem) ;
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