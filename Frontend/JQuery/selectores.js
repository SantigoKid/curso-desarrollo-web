// Esta linea hace que el código espere a que el documento termine de cargar antes de ejecutarse 
$(document).ready(function () {
    // El código JQuery va aqui

    // Selector de JQuery
    $('#test').text('He cambiado el texto con JQuery');

    // const p = document.getElementById('test');
    // p.innerHTML = 'Otro cambio de texto';

    const p = $('#test');
    p.css('color', 'blue');

    // Crear un array a partir de numerosos elementos 
    const parrafos = $('p');
    parrafos.css('fontSize', '40px');

    // Ejemplo de evento
    $('#btn').click(function() {
        $('#div').toggleClass('big')
    })


})

// Aquí podemos escribir vanilla JS
// document.getElementById('test').style.color = 'red';