<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables Globales</title>
</head>

<body>
    <h1>Variables Superglobales</h1>
    <p>
        Son variables accesibles desde cualquier punto del código, función, archivo... Sin neceesidadde hacer nada particular.
    </p>

    <h2>$GLOBALS</h2>
    <p>
        Es un Array donde podemos almacenar variables que queremos que tengan propiedad global.
        Se puede acceder a estas mediante <code>$GLOBALS[index]</code>
    </p>

    <?php
    $x = 75;
    $y = 25;

    function suma()
    {
        $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
        // $z2 = $GLOBALS['x'] + $GLOBALS['y'];
    }
    suma();
    echo $z;
    ?>

    <hr>

    <h2>$_SESSION</h2>
    <p>
        Array global que se usa para guardar información que vamos a utilizar en múltiples páginas. No guarda información en el navegador, a diferencia de las cookies.
    </p>
    <p>
        Por lo tanto, estas variables se perderán al cerrar el navegador
    </p>

    <?php
//  request method pregunta si venimos de un formulario con el 'method = post'

if ($_SERVER['REQUEST_METHOD' == 'POST']) {
    $_SESSION['username'] = $_POST['user'];
}
    ?>

</body>

</html>