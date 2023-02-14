<?php 
require('conn.php');

$text = '%' . $_REQUEST['term'] . '%' ;
$sql = "SELECT user FROM registros WHERE user LIKE '$text' ORDER BY USER ASC";
$result = $conn-> query($sql);

// Declaro un array en el que guardar la lista de los usuarios 
$array[] = '';

if ($result->num_rows 0) {
    while ($row = $result->fetch_assoc()) {
        // relleno el array con los datos del resultado de la query
        $array[] = $row['user'];
    }
 }
?>