// Creamos un array con las distintas palabras del juego
const palabras = [
    "perro",
    "conejo",
    "gato",
    "pollo",
    "langostino",
    "murcielago"
]
const pollo = [
    "p",
    "o",
    "l",
    "l",
    "o"
]


// Imprimir la palabra en pantalla
// Guardo el contenedor donde lo vamos a mostrar
let displayPalabra = document.getElementById('palabra');

// Elegimos una palabra del array
// Escoger un numero al azar

let random = Math.random(); // 0 - 1 Incluyendo decimales 
// Ponemos palabras.length para coincidir con el largo del array
random = Math.random() * palabras.length; // 0 - 6 Incluyendo decimalesS
// Redondeamos el valor de random para eliminar los decimales, creando así un número válido para el indice del array
random = Math.floor(random = Math.random() * palabras.length); // 0 - 5 sin decimales
// Cada vez que se carga la página, se selecciona un ítem del array con el índice aleatorio
let palabra = palabras[random];

// Imprimimos la palabra
// Contamos la longitud de la palabra (número de letras que tiene)
let longitud = palabra.length;
// console.log(longitud);

// Declaro una variable para imprimir los guiones
let texto = "";
for (let index = 0; index < longitud; index++)

    // Guardo un guion en la variable por cada letra que tiene nuestra palabra
    texto += "_";

// Se imprimen los guiones, ocultando la palabra de juego
displayPalabra.innerHTML = palabra;

// BOTONES
// Vamos a asignar el evento click a cada botón desde JS
// así nos ahorramos tener que escribir cada botón de HTML un "onclick"

// Con clases
// Seleccionamos todos los elementos que tienen una clase
// Al guardar elementos por clase, me los devuelve en un ARRAY
// const botones = document.getElementsByClassName('btn');

// Seleccionamos los hijos del div tablero
// Los hijos son todos los botones que tiene el div
const botones = document.getElementById('tablero').childNodes;

// Vamos a añadir un Event Listener a cada botón
// Even Listener es asignarle un tipo de evento al elemento HTML que ejecutará un bloque de código cuando el evento se cumpla
// Por ejemplo , al hacer click sobre un botón o cuando pasamos el botón por encima (hover)

for (let i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click", test)
}

function test() {
    console.log("Has pulsado un botón");

    // Tomamos el contexto del botón con this
    // Guardamos la letra que contiene el botón en una variable
    let letra = this.innerHTML;
    // Transfromo la letra en minúscula
    letra= letra.toLowerCase();

    // Declaramos variable
    let texto = "";

    // Recorremos la palabra, caracter a caracter, en busca de coincidencias con la letra pulsada
    for (let i = 0; i < palabra.length; i++) {
        console.log(palabra[i]);

        // Comprobamos si la letra de a palabra coincide con la letra del btn
        if(palabra[i] == letra) {
            console.log("Hay una coincidencia");
            texto += letra;
        } else {
            // Si entra en el else, es porque no han habido coincidencias
            texto += "_";
        }
    }
    displayPalabra.innerHTML = texto;

    console.log(letra);
}