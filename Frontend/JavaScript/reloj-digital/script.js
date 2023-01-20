// Queremos tomar la hora actual y para ello nos vamos a servir del objeto fecha Date()
// Date() es un objeto predefinido en JavaScript que contiene todos los datos de fecha y hora actualizados. 
// De este objeto podemos obtener, por ejemplo, la hora actual de cualquier zona horaria y el día de la semana en el que estamos, etc.




function clock() {
    // Creamos una copia del objeto fecha
    let fecha = new Date();

    // Obtenemos la hora actual 
    let hora = fecha.getHours();    // Esto nos dará un resultado de 0 - 23
    let minutos = fecha.getMinutes();   // 0 - 59
    let segundos = fecha.getSeconds();  // 0 - 59
    let contexto = "AM";

    let reloj = document.getElementById('pantallaReloj');

    // Damos formato a los números
    // Formato 12h
    if (hora > 12) {
        hora = hora - 12;   // Si la hora es 13, cambiará a 1
        contexto = "PM";
    }

    if (hora < 10) {
        hora = "0" + hora;
    }
    if (minutos < 10) {
        minutos = "0" + minutos;
    }
    if (segundos < 10) {
        segundos = "0" + segundos;
    }

    // Creamos el string para imprimir la hora actual
    let texto = hora + ":" + minutos + ":" + segundos + " " + contexto;

    reloj.innerHTML = texto;

    // Le damos a la función la posibilidad de que se ejecute en bucle
    setTimeout(clock, 1000);
    // El timeout ejecuta la función indicada, después de una pausa de los ms indicados
    // Al final de la función, clock() se va a ejecutar a sí tras una pausa de 1 seg (1000 ms). Creando así un bucle.
}

// Inicializar la función
clock();

function getFecha() {
    let fecha = new Date();
    let diaSemana = fecha.getDay(); // Me va a dar el dia de 0 a 6 
    // Si hoy martes, nos dará un 2, ya que cuenta desde el domingo
    let diaMes = fecha.getDate();
    let mes = fecha.getMonth();
    let year = fecha.getFullYear();

    let text = ''
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
    texto = 'Hoy es ' + dias[diaSemana] + ', ' + diaMes + ' de ' + meses[mes] + ' del año ' + year;

document.getElementById('fechaGet').innerHTML = texto;
}
getFecha();