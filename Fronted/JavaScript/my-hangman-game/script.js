const palabras = [
    "funcion",
    "declarar",
    "else",
    "let",
    "if",
    "imprimir",
    "array"
]

let displayPalabra = document.getElementById('palabra');

let random = Math.random();

random = Math.random() * palabras.length;

random = Math.floor(Math.random() * palabras.length);

let palabra = palabras[random];

let longitud = palabra.length;
// console.log(longitud);

// Procedo qa ocultar las palabras intercambiando el texto por guiones
let texto = ""
for (let index = 0; index < longitud; index++);

texto = "_";

displayPalabra.innerHTML = texto;

// procedo a hacer funcionar los botones

const botones = document.getElementById('tablero').childNodes;


for (let i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click", juego)
}

// Procedo a hacer que el juego funcione
function juego() {
    console.log('Pulsaste un botón')
}