// Block scope
 {
    //Los bloques son agrupaciones de expresiones y se contienen, dentro de las llaves {}
    let x = 5;
    console.log(x);

    var y = 11;
    // Las variablas declaradas con var tienen ámbito o alcance global y pueden ser usadas fuera del bloque.
}
{
    // BLOQUE B
    // Los bloques son independientes unos de otros 
    let x = 7;
    console.log(x);
    {

        // BLOQUE B.1
        console.log(x + 1);
        //esto funciona porque sigue estando dentro del bloque

        // sin embargo:
        let z = 1;
    }
    // Este NO funciona porque ya me he salido del bloque donde  está declarada
    // console.log(z)
}
console.log(y + 1);

// Hoisting
coche = 'seat panda'
console.log(coche);

// var coche;

