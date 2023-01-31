<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<body>
    <h1>Formulario de login</h1>
    <form action="login-user.php" method="post">
        <input type="text" name="name" placeholder="Introduzca usuario">
        <input type="text" name="password" placeholder="Introduzca contraseña">
        <input type="submit" value="Iniciar Sesión">
    </form>    
    <?php
    if (isset($_GET['fallo'])) {
        // Entramos aquí si ha habido problemas con el login
        echo '<p>Error al iniciar sesión...</p>';
        echo '<p>Si no te has registrado, pulsa <a href="form-registro.php">aquí</a> para hacerlo</p>';
    }
    ?>
    
</body>
</html>