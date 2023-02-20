$(document).ready(function () {
    $('input.pass').on('keyup  ', function () {
        // quiero comparar los valores de los inputs
        valor1 = $('input[name="pass"]').val();
        valor2 = $('input[name="confirm"]').val();

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

    $('#btnShow').click(function () {
        $('.container').toggle();
    });

    $('#btnFade').click(function () {
        $('.container').fadeToggle();
    });

    $('#btnSlide').click(function () {
        $('.container').slideToggle(1500);
    });

    // $('.cambiar').click(function () {
    //     $('.cambiar').slideToggle();
    //  });

    let contador = 0;
    let pos = 'login';
    $('.cambioForm').click(function () { 
        if (contador < 1 || pos == 'login') {
            $('.login').slideToggle(300, function () {
                $('.signup').slideToggle(300);
              });
              contador++;
              pos = 'signup';
        } else {
            $('.signup').slideToggle(300, function () {
                $('.login').slideToggle(300);
              });
              contador--;
              pos = 'login';
        }

        // $('.container').slideToggle(700);
    });
});

