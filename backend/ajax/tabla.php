<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con Ajax</title>

</head>
<style>
    body {
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 0%, rgba(175, 28, 94, 1) 74%);
    }
</style>

<body>
    <div class="container">
        <form action="">
            <input type="text" name="users" onkeyup="showUser(this.value)">
        </form>
        <div id="display">Los datos de la persona se mostrarán aquí...</div>
    </div>
</body>

<script>
    function showUser(text) {
        let display = document.getElementById('display');


        // si el input está vacio, el div también se vacia
        if (text == '') {
            display.innerHTML = '';
            return;


        } else {
            let ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    display.innerHTML = this.responseText;
                }
            };
            ajax.open ('GET', 'tabla-getuser.php?q=' + text, true);
            ajax.send();
        }
    }
</script>

</html>