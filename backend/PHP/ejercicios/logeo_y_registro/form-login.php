<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <style>
        body {
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 0%, rgba(175, 28, 94, 1) 74%);

            height: 100vh;
            width: 100%;
            margin-top: 0;
            margin-bottom: 0;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            color: white;
            margin: 12px 0;
        }

        p {
            color: white;
        }

        a {
            text-decoration: none;
            color: #fff;
            text-shadow:
                0 0 5px #fff,
                0 0 10px #fff,
                0 0 20px #fff,
                0 0 40px #0ff,
                0 0 80px #0ff,
                0 0 90px #0ff,
                0 0 100px #0ff,
                0 0 150px #0ff;

        }

        div {
            /* border: 1px solid black; */
            border-radius: 5px;

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            padding: 50px 20px;

            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            margin-bottom: 20px;

        }
        input {
            margin: 8px 0;
        }
    </style>


</head>

<body>
    <div class="orden">
        <h1>Formulario de login</h1>
        <form action="login-user.php" method="post">
            <input type="text" name="name" placeholder="Introduzca usuario">
            <input type="password" name="password" placeholder="Introduzca contraseña">
            <input type="submit" value="Iniciar Sesión">
        </form>
    
    <?php
    if (isset($_GET['fallo'])) {
        // Entramos aquí si ha habido problemas con el login
        echo '<p>Error al iniciar sesión...</p>';
        echo '<p>Si no te has registrado, pulsa <a href="form-registro.php">aquí</a> para hacerlo</p>';
    }
    ?>
    </div>

</body>

</html>