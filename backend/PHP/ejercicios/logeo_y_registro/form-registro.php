<?php

// Include ejecuta el archivo indicado
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
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

        p {
            color: white;
        }

        h1 {
            color: white;
        }
        div {
            /* border: 1px solid black; */
            border-radius: 5px;
            width: 350px;

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
            /* align-items: center; */
            flex-direction: column;
            /* text-align: left; */
            margin-bottom: 20px;

        }
        input {
            margin: 8px 0;
        }
    </style>
</head>

<body>
    <div>
        <h1>Sign Up</h1>
        <form action="signup-user.php" method="post">

            <label for="name">Name</label>
            <input type="name" id="name" name="name" required>


            <label for="email">email</label>
            <input type="email" id="email" name="email" required>


            <label for="password">password</label>
            <input type="password" id="password" name="password" required>



            <label for="password_confirmation">Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">


            <button>Sign Up</button>



        </form>
    </div>
</body>

</html>