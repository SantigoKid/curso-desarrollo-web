<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<style>
     body {
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 0%, rgba(175,28,94,1) 74%);
    }
    p {
        color: white;
    }
</style>
</head>
<body>
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
?>
</body>
</html>
