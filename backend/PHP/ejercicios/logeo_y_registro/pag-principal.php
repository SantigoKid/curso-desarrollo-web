<?php
session_start();

if(isset($_POST['logout'])){
    unset($_SESSION['logged']);
}
?>
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
    <!-- panel de usuario -->
    <div>
        <?php
        // este if pregunta si el usuario está logeado
        if (isset($_SESSION['logged'])) {
            // aquí va el panel/botón/contenido del usuario
            echo '<a href="panel-user.php"><button>Ir a mi cuenta</button></a>';
            echo "<form action='pag-principal.php' method='post'>
            <input type='submit' value='Cerrar sesión' name='logout'>
            </form>";
        } else {
            // Si no está logeado, mostramos el botón de iniciar sesión
            echo '<a href="form-login.php">
                    <button>Iniciar sesión</button>
                 </a>';
        }
        ?>
    </div>
    <div class="btn">

    </div>

</body>

</html>