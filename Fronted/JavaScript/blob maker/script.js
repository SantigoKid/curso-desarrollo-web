// El códgio númerico del border-radius
let outputcode = document.querySelector('.outputcode');

// Array con los sliders
let sliders = document.querySelectorAll('input[type="range"]')

// recorremos el array para asignar un evento en cada slider
sliders.forEach(function(slider) {
    slider.addEventListener('change', createBlob)
});

// Array con los input númericos
const inputs = document.querySelectorAll('input[type="number"]');

// Asignamos eventos a lso inputs
inputs.forEach(function(input) {
    input.addEventListener('change', createBlob)
});

// función que crea un blob cada vez que alteramos un slider o input
function createBlob() {
let radiusOne = sliders [0].value;
let radiusTwo = sliders [1].value;
let radiusThree = sliders [2].value;
let radiusFour = sliders [3].value;

// recogemos los valores numérico de altura y anchura
let blobHeight = inputs[0].value;
let blobWidth = inputs[1].value;

// creamos una variable que reúna todos estos valores 
let borderRadius = `${radiusOne}% ${100 - radiusOne}% ${100 - radiusThree}% ${radiusThree}% / ${radiusFour}% ${radiusTwo}% ${100 - radiusTwo}% ${100-radiusFour}%`

// escribimos el css del blob con los datos de los inputs 
document.querySelector('.output').style.cssText =
`border-radius:${borderRadius};
height:${blobHeight}px;
width:${blobWidth}px;`;

// Imprimimos en pantalla el valor del border-radius
outputcode.innerHTML = `${borderRadius}`;
}

function copy() {
    var r = document.createRange();
    r.selectNode(outputcode);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(r);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();
}
