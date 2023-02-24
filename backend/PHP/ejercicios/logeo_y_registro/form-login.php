<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <style>
        body {
            background-image: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 0%, rgba(175, 28, 94, 1) 74%);
            transition: all 1s;
            height: 100vh;
            width: 100%;
            margin-top: 0;
            margin-bottom: 0;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        div#background {
            background-image:  linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(210,176,191,1) 0%, rgba(214,34,136,1) 73%);
            width: 100vw;
            height: 100vh;

            position: absolute;
            top: 0;
            left: 0;
            z-index: -5;
        }


        div.divBtn {
            display: flex;
            justify-content: space-between;

            width: 285px;
            margin: 20px;
            background-color: transparent;
            box-shadow: none;
        }

        .divBtn button {
            background-color: #072d535e;
            color: white;
            border-radius: 5px;
            border: none;
            transition: all .5s;
            padding: 5px;
        }
        .divBtn button:hover {
    box-shadow: inset 0 0 2px 2px white;
    cursor: pointer;
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
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            margin-bottom: 20px;
            /* position: relative; */
            width: 350px;

        }

        input {
            margin: 8px 0;
        }

        .cuerpo {
    background: linear-gradient(90deg, rgba(0,212,255,1) 13%, rgba(41,45,46,1) 100%, rgba(31,222,224,1) 212%, rgba(210,176,191,1) 255%);
    transition: all 1s;
}
    </style>


</head>

<body id="body" class="cuerpo">
    <div id="background"></div>

    <div class="divBtn">
        <button id="btnShow">Mostrar/ocultar</button>
        <button id="btnFade">Desvanecer</button>
        <button id="btnSlide">deslizar</button>
    </div>

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
    <div class="divBtn">

        <button id="btnClass" class="cambiar">Cambiar color</button>
        <button id="btnBG" class="cambiar">Cambiar fondo</button>
    </div>

</body>
<script>
    $(document).ready(function() {
        $('input.pass').on('keyup  ', function() {
            // quiero comparar los valores de los inputs
            let valor1 = $('input[name="pass"]').val();
            let valor2 = $('input[name="confirm"]').val();

            $('input[type="submit"]').attr('disabled', true);

            // Sólo se ejecutara cuando los inputs tengan la misma longitud
            if (valor1.length == valor2.length) {
                if (valor == valor2) {
                    // Si los valores coinciden

                    // Activamos el botón de registro
                    $('input[type="submit"').removeAttr('disabled');

                } else
                    alert('las contraseñas no coinciden');

            }
        })

        $('#btnShow').click(function() {
            $('.container').toggle();
        });

        $('#btnFade').click(function() {
            $('.container').fadeToggle();
        });

        $('#btnSlide').click(function() {
            $('.container').slideToggle(1500);
        });

        // $('.cambiar').click(function () {
        //     $('.cambiar').slideToggle();
        //  });

        let contador = 0;
        let pos = 'login';
        $('.cambioForm').click(function() {
            if (contador < 1 || pos == 'login') {
                $('.login').slideToggle(300, function() {
                    $('.signup').slideToggle(300);
                });
                contador++;
                pos = 'signup';
            } else {
                $('.signup').slideToggle(300, function() {
                    $('.login').slideToggle(300);
                });
                contador--;
                pos = 'login';
            }

            $('div#background').fadeToggle(1000);

            // $('.container').slideToggle(700);
        });

        $('#btnClass').click(function() {
            $('body').toggleClass('cuerpo');
            console.log('funciona');
        });
        $('#btnBG').click(function() {
            $('div#background').fadeToggle(1000);
            console.log('funciona');

        });
    });
</script>

</html>