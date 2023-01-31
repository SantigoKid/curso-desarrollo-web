<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    // Recibimos las variables del form
    $user = $_POST['name'];
    // $email = $_POST['email'];
    $password = $_POST['password'];

    
    // Hacemos la query para buscar si existe un usuario con estos datos
    $sql = "SELECT * FROM registros WHERE name = '$user' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       echo '<p>Has iniciado sesión con éxito</p>';
       echo "<p>Bienvenido $user.";
    } else {
        // En caso de login incrrecto:
        header('Location: form-login.php?fallo=true');
    }
}