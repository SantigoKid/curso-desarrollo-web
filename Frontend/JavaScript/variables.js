// const y let
const precio1 = 5;    //Esta varibale nunca va a cambiar 
const precio2 = 6;
let total = precio1 + precio2; // res. = 11
onsole.log(total);
// Esta variable puede cambiar
total = precio1 * 2 + precio2; // res. = 16
console.log(total);



// Si tratamos de asignar nuevos valores a las variables constantes, nos dará un error y el código se detendra
// precio1 = 10;
// console.log(precio1);

// números y strings
const pi = 3.14 // sabemos que esta variable contendrá un valor constante
let nombre = 'alan';
let edad = '34';

console.log(edad+ pi); // suma de dos números res= 37.14
let edad = '34'; // ahora estoy escribiendo el número como un string
console.log(edad+ pi); // suma de núnmero y string res = 343.14

//valor undefined

let coche; // Hemos declarado la varibale pero no le hemos asignado algún valor.

console.log(coche);