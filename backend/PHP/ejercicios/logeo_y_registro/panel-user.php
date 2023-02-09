<?php
session_start();
include 'conn.php';

if (isset($_SESSION['logged']) && $_SESSION['usertype'] == 'admin') {
    $sql = 'SELECT * FROM registros';
} elseif ($_SESSION['usertype'] == 'user') {
    $user = $_SESSION['name'];
    $sql = "SELECT * FROM registros WHERE name = '$user'";
}
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con base de datos</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border: 3px solid black;
            border-collapse: collapse;
        }

        th {
            background-color: #aabbcc;
            border: 2px solid black;
            padding: 2px 5px;
        }

        td {
            border: 1px solid black;
            padding: 2px 5px;
        }
        input {
            border: none;
            outline: none;
        }
        .mod {
            cursor: pointer;
            /* border: 1px solid black; */
            background-color: rgb(12, 50, 80);
            color: white;
        }
    </style>
</head>

<body>
    <h1>Tabla de los usuarios de la BD</h1>
    <table>

        <?php
        if ($result->num_rows > 0) {
            echo "<tr>
            <th>id</th>
            <th>nombre</th>
            <th>contraseña</th>
            <th>email</th>
            <th>tipo de usuario</th>
            <th>Acciones</th>
            </tr>";
            // imprimir los datos de cada fila
            while ($row = $result->fetch_assoc()) {
                // echo "<tr> <td>" . $row['id'] . "</td>" . 
                // "<td>" . $row['name'] . "</td>" .
                //     "<td>" . $row['password'] . "</td>" .
                    
                //     "<td>" . $row['usertype'] . "</td> </tr>";

                if($row['usertype'] == 'admin') {
                    $user1 = 'admin';
                    $user2 = 'user';
                } else {
                    $user1 = 'user';
                    $user2 = 'admin';
                }

                echo "<tr> <form action='update-user.php' method='post'>
                           <td>" . "<input name='id' hidden value='" . $row['id'] . "'>" . $row['id'] . "</td>" . 
                          "<td>" . "<input name='name' value='" . $row['name'] . "'>" . "</td>" .
                          "<td>" . "<input name='password' value='" . $row['password'] . "'>" . "</td>" .
                          "<td>" . "<input name='email' value='" . $row['email'] . "'>" . "</td>" .
                          "<td>
                          <select name='usertype'>
                            <option name='usertype' value='". $user1 ."'>". $user1 ."</option>
                            <option name='usertype' value='". $user2 ."'>". $user2 ."</option>
                           </select>
                          </td> 
                          <td> <input class='mod' type='submit' name='edit' value='Modificar'>
                               <input class='mod' type='submit' name='delete' value='Eliminar'>
                          </form> 
                          </tr>";
            }
        }

        $conn->close();
        ?>
    </table>
    

</body>

</html>