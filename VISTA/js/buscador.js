
/* Aquí se implementan las funciones relacionadas con el buscador */
// -------------------------------------------------------------------

let textoUsuario = "" ;
let listaCoincidencias = [] ;
let coincidenciaEncontrada = false ;
let datosJSON ; // NO SE ESTÁ UTILIZANDO

$(document).ready(function (){

    // Hacer la solicitud AJAX para obtener los datos
    $.ajax({

        url: `http://localhost/La_Mesa_Cuadrada/MODELO/JSON/prueba.json`,
        method: 'GET',
        dataType: 'json',

        success: function (response) {

            console.log("ESTOY DENTRO DEL SUCCESS") ;

            datosJSON = response ; // NO SE ESTÁ UTILIZANDO
            
            // Manejar la respuesta del servidor
            console.log('Datos recibidos:', response) ;

            // Por ejemplo, mostrar los datos en algún lugar de tu página
            // Aquí asumo que tienes un elemento con id="datos" donde deseas mostrar los datos
            
            $('#formBuscador').submit(function (event) {
                event.preventDefault();
                console.log("ESTOY DENTRO DEL EVENTO SUBMIT") ;
                haceAlgo() ;
                
            });
            
            $('#buscador').keyup(function () {
                
                console.log("ESTOY DENTRO DEL EVENTO DE KEYUP") ;
                // textoUsuario = document.getElementById("buscador").value ;
                textoUsuario = $("#buscador").val() ;
                console.log("textoUsuario: " + textoUsuario) ;
                // haceAlgo(response) ;
                muestraSugerencias(response, textoUsuario) ;
            })

            console.log("ESTOY DENTRO DEL SUCCESS PERO EN LA PARTE FINAL, DONDE ESTÁ EL PINTACARDRESULTADO") ;
            
            pintaCardResultado(response) ;
            
        },
        error: function (xhr, status, error) {
            // Manejar cualquier error que ocurra durante la solicitud
            console.error('Error al obtener los datos:', error);
        }
    });
    
    // $("#pruebaResultado").html("Texto desde JS");

    // console.log("Contenido de datosJSON: " + datosJSON) ;

});

// ESTO VALDRÁ PARA LAS SUGERENCIAS

/* Cómo funciona:
    Al carcar el documento, mediante al Ajax se carga al json de prueba. A través de un escuchador de pulsación 
    hace algo. Ese algo será la comprobación de lo escrito con lo que hay en el json.*/

function haceAlgo() {

    window.location.href = 'http://localhost/La_Mesa_Cuadrada/index.php?pagina=buscador&resultado=' + textoUsuario + '&encontrado=' + coincidenciaEncontrada ;
}

function muestraSugerencias(datos, textoUsuario) {

    coincidenciaEncontrada = false;

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

    else if (!coincidenciaEncontrada) { // ESTO PODRÍA SER UN ELSE
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
    
    // const linkItem = ""

    // $('#sugerencias').html(linkItem) ;

    // Forma más limpia:
    $('#sugerencias').empty() ;
}



function pintaCardResultado(datos) {
    
    let listaResultados = [] ;
    let textoGET = "" ;
    let card ;

    $("#pruebaResultado").empty() ;

    // $("#resultadoBusqueda").html("El enlace es: " + datos["Tuki"][0].enlace);

    
    const urlParams = new URLSearchParams(window.location.search);
    textoGET = urlParams.get('resultado');
    // console.log("El texto pasado por GET es: " + resultado); // Output: "texto"
    
    for (const categoria in datos) { // Itera sobre las categorías
        if (datos.hasOwnProperty(categoria)) {
            console.log(`Comparando: ${categoria.toLowerCase()} con ${textoGET.toLowerCase()}`);
            
            if (textoGET.trim() !== ""){
                
                if (categoria.toLowerCase().includes(textoGET.toLowerCase())) {
                    
                    console.log("Coincidencia encontrada en la categoría: " + categoria) ;
                    listaResultados.push(categoria) ; // Guarda la coincidencia en el array
                    console.log("listaCoincidencias: " + listaResultados) ;
                }
            }
        }
    }
    console.log("Contenido de la lista de coincidencias: " + listaResultados) ;


    listaResultados.forEach(element => {
        let json = datos[element];
        
        let enlace = json[0].enlace;
        let nombre = json[1].nombre;
        let imagen = json[2].imagen;
        let descripcion = json[3].descripcion;

        card = $('<div>', { class: 'col mx-2' }).append(
            $('<div>', { class: 'card', style: 'width: 12rem;' }).append(
                $('<img>', { src: 'PAGINAS/img/' + imagen + '_card.png', class: 'card-img-top', alt: '...' }),
                $('<div>', { class: 'card-body' }).append(
                    $('<h5>', { class: 'card-title text-center' }).text(nombre),
                    $('<hr>', { class: 'text-danger' }),
                    $('<p>', { class: 'card-text' }).text(descripcion),
                    $('<a>', { href: 'index.php?pagina=' + enlace, class: 'btn btn-danger d-flex justify-content-center' }).text('¡Jugar!')
                )
            )
        );

        $('#resultadoBusqueda').append(card);
    });

}

                // <div class="container d-flex justify-content-start">
                //     <div class="row">

                //         <div class="col mx-2">
                //             <div class="card" style="width: 12rem;">
                //                 <img src="PAGINAS/img/tuki_card.png" class="card-img-top" alt="...">
                //                 <div class="card-body">
                //                   <h5 class="card-title text-center"> Tuki Tuki </h5>
                //                   <hr class="text-danger">
                //                   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                //                   <a href="#" class="btn btn-danger d-flex justify-content-center"> ¡Jugar! </a>
                //                 </div>
                //             </div>
                //         </div>

                //     </div>
                // </div>

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