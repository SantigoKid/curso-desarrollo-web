<?php

// Include ejecuta el archivo indicado
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
</head>

<body>
    <div>
        <h1>Formulario para insertar datos en una BD</h1>
        <form action="welcome.php" method="post" >
            <input type="text" placeholder="user" name="user" required>
            <input type="text" placeholder="email" name="email"
            required>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>