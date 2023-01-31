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
    <title>Formulario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Sign Up</h1>
    <form action="signup-user.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="name" id="name" name="name" required>
        </div>
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" >
        </div>

        <button>Sign Up</button>


    </form>
</body>
</html>
