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
displayPalabra.innerHTML = texto;

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
    botones[i].addEventListener("click", juego)
}
// declaramos un array en el que vamos guardando los aciertos
let aciertos = [];
let contador = 0;

let vidas = 5;
// Digamos que tenemos la palabra langostino y pulsamos la o
// Queremos guardar aquellas letras que hemos acertado
let ejemplo = [
    "_", // p
    "_", // e
    "_", // r
    "_", // r
    "o" // o
]
// Entonces, seguidamente al usuario el cambio de pantalla  debeemos imprimir el contenido del array
// "_ _ _ _ o"
// Si luego pulsamos la r el resultado quedaría:
ejemplo = [
    "_", // p
    "_", // e
    "r",
    "r",
    "o"
]
// Y si imprimos los cambios en pantalla sería "_ _ r r o"

function juego() {
    console.log("Has pulsado un botón");

    // Tomamos el contexto del botón con this
    // Guardamos la letra que contiene el botón en una variable
    let letra = this.innerHTML;
    // Transfromo la letra en minúscula
    letra = letra.toLowerCase();

    // 
    let exitos = 0;

    // Declaramos variable
    //  let texto = "";

    // Recorremos la palabra, caracter a caracter, en busca de coincidencias con la letra pulsada
    for (let i = 0; i < palabra.length; i++) {
        console.log(palabra[i]);

        // Comprobamos si la letra de a palabra coincide con la letra del btn
        if (palabra[i] == letra) {
            console.log("Hay una coincidencia!");
            // Guardamos la letra acertada en el array de aciertos en la misma posción que tiene la palabra
            aciertos[i] = letra;

            // 
            contador++;
            exitos++;
        } else if (!aciertos[i]) {
            // Si entra en el else, es porque no han habido coincidencias
            // La conidición if() solo se cumple cuando la posición i del array no tiene ningún valor
            aciertos[i] = "_";
        }
        console.log(texto);
        console.log(aciertos);
    }
    // Si no hay exitos al ganar me resto una vida
    if (exitos == 0) {
        vidas--;
        this.style.backgroundColor = 'red';
    }
    else {
        this.style.backgroundColor = 'green';
    }
    // Creamos el string para imprimir en pantalla y que quitamos las comas al array 
    // Sin el join  la palabra "conejo" se vería "c,o,n,e,j,o"
    texto = aciertos.join("");
    displayPalabra.innerHTML = texto;

    console.log(letra);

    // Al final comprobamos si hemos ganado
    ganar();
}

// Creamos una función donde comprobemos si hemos ganado la partida y en ese caso, mostrar un mensaje.
function ganar() {
    // Comprobar que el número de aciertos es iguala a la longitud de la palabra
    if (contador == palabra.length) {
        // Mensaje de has ganado
        setTimeout(function () {
            // Le ponemos un retardo para que se pueda visualizar el resultado antes de mostrar el mensaje
            // window.alert('Has ganado');
            // location.reload();

        }, 1000);
    }

    // Comprobar que ya no hay guiones en el array aciertos
    // Contador de los guiones
    let guiones = 0;

    // Recorremos el array de aciertos en busca de guiones
    for (let i = 0; i < aciertos.length; i++) {

        if (aciertos[i] == "_") {
            guiones++;
        }
    }
    // Si hemos contado los guiones y no hay, es porque la palabra está completa y, por tanto, hemos ganado
    if (guiones == 0) {
        setTimeout(function () {
            window.alert('has ganado');
            location.reload();
        }, 1000);
    }
}
