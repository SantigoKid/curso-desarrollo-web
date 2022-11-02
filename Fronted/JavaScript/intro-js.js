
    function colorChange() {
        //una función es un bloque de código que se puede reutilziar

        //Para cambiar el párrafo de color lo primera es identificar y apuntar el párrafo
        document.getElementById('pColor').style.color = 'red';
        document.getElementById('pColor').style.backgroundColor = 'rgb(60,60,60)';

    }

    function showDate() {

        document.getElementById('pDate').innerHTML = new Date();
        //Date() e sun objeto predefinido de JS, contiene todos los datos referentes a la fecha actual (dia de la semana, fecha, hora, año...)
        // Cada vez que pulsamos el botón la hora se actualiza. Estos gracias a la palabra new, que genera un nuevo objeto fecha cada vez que se ejecuta.
    }

    function hideShow() {
        var condition = document.getElementById('pHide').style.visibility;
        // condición es una variable, y guarda un dato. En ese caso guarda el valor de la visibilidad del parrafo. Puede ser 'hidden' o 'visible'
        // el símbolo = significa que le estamos asignando un valor
        if (condition == 'hidden') {
            //si la condición se cumple (el elemento es invisible) se ejecuta el código contenido en las llaves
            document.getElementById('pHide').style.visibility = 'visible';

        } else {
            //  si la condición de arriba no se cumple ( es decir, que el objeto es visible) el if es ignorado y en cambio, se ejecuta el else
            document.getElementById('pHide').style.visibility = 'hidden';
        }
    }

    var bulb = document.getElementById('bulb');
    var status = "off";
    var on = "../recursos/bombilla-encendida.gif";
    var off = "../recursos/bombilla-apagada.gif";

    function lightSwitch() {

        if (status == "off") {
            bulb.src = on;
            status = "on";
        } else {
            bulb.src = off;
            status = "off";
        }
    }

