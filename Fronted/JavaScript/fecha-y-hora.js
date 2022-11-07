let fecha = new Date();
document.getElementById('testDate').innerHTML = fecha;
// Creando objetos fecha
// Con un string:
let fechaString = new Date('February 07, 1999 04:15:00');
let fechaStringShort = new Date('1999-02-07');

document.getElementById('dateString').innerHtml = fechaStringShort;

// Con números
let fechaNum = new Date(2001, 06, 23);
document.getElementById('dateNumber').innerHTML = fechaNum;

// con milisegundos:
setInterval(() => {
 document.getElementById('fechaMS').innerHTML = new Date().getTime();},1);

 document.getElementById('fechaMS2').innerHTML = new Date('1965-07-04').getTime();

//  Imprimir fechas
// Con DateString
document.getElementById('fechaDateString').innerHTML = new Date().toDateString();

// Metodos GEt
// Construir un string para imprimir la fecha como queramos
// 'Hoy es lunes 07 de noviembre del año 2022'

function getFecha() {
    let fecha = new Date();
    let diaSemana = fecha.getDay(); // Me va a dar el dia de 0 a 6 
    // Si hoy martes, nos dará un 2, ya que cuenta desde el domingo
    let diaMes = fecha.getDate();
    let mes = fecha.getMonth();
    let year = fecha.getFullYear();

    let text = ''

    // if (diaSemana = 0) {
    //     diaSemana = 'Domingo';
    // }
    // if (diaSemana = 1) {
    //     diaSemana = 'Lunes';
    // }
    // if (diaSemana = 2) {
    //     diaSemana = 'Martes';
    // }

// Esto no es recomendable porque habría que poner un if por cada día de la semana

// El método ideal para hacer esto es usando un array [] 
// Un array es un tipo especial de variable que puede guardar varios tipos de datos y que los clasifica usando un indice 
// Vamos a crear un arrray con los días de la semana:

const dias = [
    "domingo",
    "lunes",
    "martes",
    "miercoles",
    "jueves",
    "viernes",
    "sabado"
]
const meses = [
    'enero',
    'febrero',
    'marzo',
    'abril',
    'mayo',
    'junio',
    'julio',
    'agosto',
    'septiembre',
    'octubre',
    'noviembre',
    'diciembre'
]
// Cada elemento del array, pertenece a una posición del índice
// Los índices de los array empiezan a contar desde 0

// Construimos el string "Hoy es lunes, 07 de noviembre del 2022"

texto = 'Hoy es ' + dias[diaSemana] + ' , ' + diaMes + ' de ' + meses[mes] + ' del año ' + year;

document.getElementById('fechaGet').innerHTML = texto;
}
getFecha();
