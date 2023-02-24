<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>

<body>

    <body id="body" class="cuerpo">
        <div id="background"></div>

        <div class="divBtn">
            <button id="btnShow">Mostrar/ocultar</button>
            <button id="btnFade">Desvanecer</button>
            <button id="btnSlide">deslizar</button>
        </div>

        <div class="big-container">
            <div class="container signup">
                <h1>Registro de nuevo usuario</h1>
                <form action="login-user.php" method="post"> 
                    <div>
                        <input type="text" name="user" required>
                        <label for="">Usuario</label>
                    </div>

                    <div>
                        <input class="pass" type="text" name="pass" required>
                        <label for="">Contraseña</label>
                    </div>

                    <div>
                        <input class="pass" type="text" name="confirm" required>
                        <label for="">Confirme contraseña</label>
                    </div>

                    <div>
                        <input type="submit" value="Registrarse" disabled>
                    </div>
                </form>
                <button class="cambiar cambioForm">Botón 1</button>
            </div>
            <div class="container login">
                <h1>Inicio de sesión</h1>
                <form action="">
                    <div>
                        <input type="text" name="user" required>
                        <label for="">Usuario</label>
                    </div>

                    <div>
                        <input class="pass" type="text" name="pass" required>
                        <label for="">Contraseña</label>
                    </div>


                    <div>
                        <input type="submit" value="Login">
                    </div>


                </form>
                <button class="cambiar cambioForm">Botón 1</button>
            </div>
        </div>

        <div class="divBtn">

            <button id="btnClass" class="cambiar">Cambiar color</button>
            <button id="btnBG" class="cambiar">Cambiar fondo</button>
        </div>

    </body>

</html>
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