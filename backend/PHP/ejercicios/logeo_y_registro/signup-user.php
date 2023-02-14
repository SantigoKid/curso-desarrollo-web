<?php

include 'conn.php';
$user = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM registros WHERE name = '$user' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    # code... si el usuario existe, mostrar mensaje
} else {
    $sql = "INSERT INTO registros (name, email, password)
        VALUES ('$user', '$email', '$password')";

    // Ejecutamos la Query y comprobamos si ha sido exitosa
    if ($conn->query($sql) === TRUE) {
        echo 'Datos guardados con exito';
        echo '<a href="form-login.php"><button>Iniciar sesión</button></a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerramos la conexión con la BD
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <style>
        body {
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 0%, rgba(175, 28, 94, 1) 74%);
        }
    </style>
</head>

<body>
    <p>
        Bienvenido, <?php echo $_POST['name'] ?>.
    </p>
    <p>Tu email es <?php echo $_POST['email'] ?>.</p>
</body>

</html>