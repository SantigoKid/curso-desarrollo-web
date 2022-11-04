function calculateTip() {
    // Tomamos los datos que ha introducido el usuario
    var bill = document.getElementById('totalBill').value;
    var service = document.getElementById('serviceQual').value;
    var people = document.getElementById('numPeople').value;

    // Calculo lo mque debe pagar cada uno y lo guardo en una variable
    var resultado = bill * service / people;

    // Accedo al elemento donde quiero imprimir el resultado
    var parrafo = document.getElementById('pResultado');

    if (resultado > 0) {

         // Lo muestro porque está oculto por defecto
    parrafo.style.visibility = 'visible';
    // y lo relleno con el texto que quiero mostrar
    parrafo.innerHTML = resultado.toFixed(2) + "€ por persona";

    }
   
    //Imprimimos los datos en la consola
    console.log(bill + "€");
   

    //Para obtnener la propina hay que multiplicar el gasto por la calidad del servicio para obtener el correspondiente porcentaje y, por tanto, la propina total

    // seguidamente seguir dividir la propina entre el número de comensales para obtener lo que debe pagar cada uno
}





