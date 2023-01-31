<?php
// preguntamos si el usuario viene del formulario de logeo o del inicio de sesión
if ($_SERVER['REQUEST_METHOD' == 'POST'] || isset($_SESSION['usertype'])) {
    // Iniciamos la sesion
    session_start();

    // Guardamos el tipo de usuario en el array de sesión
    $_SESSION['usertype'] = $_POST['usertype'];


// Si el usuario es admin
if ($_SESSION == "admin") {
    // Mostramos contenido exclusivo del usuario
    echo "Bienvenido, administrador.";
} elseif ($_SESSION == 'user') {
    // Mostramos contenido exclusivo del usuario
    echo "hola ususario";
}
// Fuera del if podemos poner contenido para todos los tipos de usuario 


// Botón para cerrar la sesión. Debe de ser un submit que hga refrescar la página 

echo "<form action= " . $_SERVER["PHP_SELF"] . " method = 'post'>
          <input type= 'submit' name= 'close' value='cerrar sesion'>
          </form>";


} else {
    // Si hemos venido directamente a esta página, seremos redirigidos
    header("request-method-form.php");
    exit();
}
