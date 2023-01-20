const display = document.getElementById('display');
const displayLetras = document.getElementById('displayLetras');
let texto = '';
let arrayNumeros = [];

// Queremos imprimir numeros del 1 al 20
for (let i = 0; i < 100; i = i + 2) {
    texto += i + " ";
}

display.innerHTML = texto;
console.log(arrayNumeros)

const letras = [
    "a",
    "e",
    "i",
    "o",
    "u"
]

texto = '';

for (let i = 2; i < letras.length; i++) {
    texto += letras[i] + " ";

}

displayLetras.innerHTML = letras.join(' ');

texto = '';

for (let i = 100; i>= 1; i--) {
    texto += i + "<br>"
}

display.innerHTML = texto;

let pares = [];
for (let i = 1; i <= 10; i++) {
    pares[i- 1] = i * 2;

}
console.log(pares)
display.innerHTML = pares;

// Numeros pares hasta el 100, y cada vez que salga un multiplo de 5 vaya en negrita

let txt = ''

for (let i = 2; i < 100; i = i + 2) {
    

//  Si se divide i entre 5 y no hay resultados (decimales), entra en el if
if (i % 5 == 0){
    txt += "<b>" + i + "</b></br>";
}
else {
    txt += i + "<br>";
}
}
display.innerHTML = txt;

// Cuenta atras en un array

let countdown = [];
let index = 0;     
    for (let j = 100; j >= 0; j--) {
        
        countdown[index] = j;
        index++;
    }

    console.log(countdown)
    display.innerText = countdown.join('<br>');