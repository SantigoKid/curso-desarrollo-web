<?php
session_start();
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
       echo '<a href="pag-principal.php">
       <button>Página Principal</button>
    </a>';

       $_SESSION['logged'] = true;
       while ($row = $result->fetch_assoc()) {
        // Creamos una array $row con los resultados de la query del usuario
        $_SESSION['id'] = $row['id']; // Primary key
        $_SESSION['usertype'] = $row['usertype'];
       }
    } else {
        // En caso de login incrrecto:
        header('Location: form-login.php?fallo=true');
    }
}
?>