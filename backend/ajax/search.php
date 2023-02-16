<?php

require('conn.php');

$text = '%' . $_REQUEST['term'] . '%';
$sql = "SELECT user FROM usuarios WHERE user LIKE '$text'";
$result = $conn->query($sql);

//declaro un array en el que guardar la lista de los usuarios
$array[] = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // relleno el array con los datos del resultado de la query
        $array[] = $row['user'];
    }

    echo "red";

} else echo "green";

// foreach ($array as $user) {
//     // cada ítem del array se imprimirá seguido de un br, formando una lista
//     echo $user . '<br>';
// }

/* if (el usuario no existe) {
    echo "<script>
    colorChange('green');
    </script>";
// else colorChange('red');
*/
