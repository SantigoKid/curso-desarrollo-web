<?php
include 'conn.php';

$user = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$usertype = $_POST['usertype'];
$id = $_POST['id'];


// Hacemos la query para buscar si existe un usuario con estos datos
if (isset($_POST['edit'])) {
    $sql = "UPDATE registros SET name = '$user',  password = '$password', usertype = '$usertype', email = '$email'
    WHERE id = '$id'";

    $msj = '<p>Se ha actualizado</p>';
}

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM registros
    WHERE id = '$id'";

    $msj = '<p>se ha borrado</p>';
}

$result = $conn->query($sql);
// El update solo entiende de exito o error, comprobamos que el result equivale a true porque ha tenido exito la query. El insert o el delete enteinde de exito o result.
if ($result == true) {
    echo $msj;
    echo '<a href="pag-principal.php">
        <button>Página Principal</button>
     </a>';
    echo '<a href="panel-user.php">
     <button>Tu panel de usuario</button>
  </a>';
}
