<?php
session_start();
include 'conn.php';

$user1 = '';
$user2 = '';
$selector = '';

if (isset($_SESSION['logged']) && $_SESSION['usertype'] == 'admin') {
    $sql = 'SELECT * FROM registros';
    
} elseif ($_SESSION['usertype'] == 'user') {
    $user = $_SESSION['name'];
    $sql = "SELECT * FROM registros WHERE name = '$user'";
    $selector = 'user';
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
            /* display: flex; */
            flex-direction: column;
            text-align: center;
            align-items: center;
            /* justify-content: center;º */
            /* padding: 50px; */
            margin: 100px;
            /* font-size: 40px; */
        
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 0%, rgba(175,28,94,1) 74%);
        }
        p {
        color: white;
    }
    h1 {
        color: white;
    }
        .centro {
            display: flex;
            justify-content: center;
        }

        table {
	width: 900px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
    font-size: 1.5rem;
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
    
}

th {
	text-align: left;
    background-color: #55608f;
    /* width: 200px; */
    cursor: default;
}

td {
    position: relative;
    cursor: default;
}

/* td:hover:before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: -9999px;
  bottom: -9999px;
  background-color: rgba(255, 255, 255, 0.2);
  z-index: -1;
} */

tr:hover {
  background-color: rgba(255, 255, 255, 0.3);
}


select {
    background-color: transparent;
    color: white;
}
        input {
            border: none;
            outline: none;
            background-color: transparent;
            color: white;
            font-size: 1rem;
        }
        .mod {
            display: flex;
            cursor: pointer;
            /* border: 1px solid black; */
            background-color: rgb(12, 50, 80);
            color: white;
            background-color: transparent;
            font-size: 1rem;
        }

        button {
            font-size: 18px;
            margin-top: 30px;
            background: rgba(146, 142, 138, 0.5); 
            width: 200px;
            height: 45px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            font-size: 18px;
            margin-top: 30px;
            background: rgba(146, 142, 138, 1); 
            width: 200px;
            height: 45px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition-delay: 0.2s ;
            color: white;
            border: 1px solid rgba(32, 192, 255, 1); 
        }
        option {
            /* background-color: transparent; */
            color: black;
            font-size: 1rem;
        }

        select {
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <h1>Tabla de los usuarios de la BD</h1>
    <div class="centro">
    <table>

        <?php
        if ($result->num_rows > 0) {
            echo "<tr>
            <th>id</th>
            <th>nombre</th>
            <th>contraseña</th>
            <th>email</th>
            <th>tipo de usuario</th>
            <th>Administrar</th>
            </tr>";
            // imprimir los datos de cada fila
            while ($row = $result->fetch_assoc()) {
                // echo "<tr> <td>" . $row['id'] . "</td>" . 
                // "<td>" . $row['name'] . "</td>" .
                //     "<td>" . $row['password'] . "</td>" .
                    
                //     "<td>" . $row['usertype'] . "</td> </tr>";

                if (isset($_SESSION['logged']) && $_SESSION['usertype'] == 'admin') {
                    if($row['usertype'] == 'admin') {
                        $user1 = 'admin';
                        $user2 = 'user';
                    } else {
                        $user1 = 'user';
                        $user2 = 'admin';
                    }
                    $selector = "<select name='usertype'>
                    <option name='usertype' value='". $user1 ."'>". $user1 ."</option>
                    <option name='usertype' value='". $user2 ."'>". $user2 ."</option>
                    </select>";
                }

                echo "<tr> <form action='update-user.php' method='post'>
                           <td>" . "<input name='id' hidden value='" . $row['id'] . "'>" . $row['id'] . "</td>" . 
                          "<td>" . "<input name='name' value='" . $row['name'] . "'>" . "</td>" .
                          "<td>" . "<input name='password' value='" . $row['password'] . "'>" . "</td>" .
                          "<td>" . "<input name='email' value='" . $row['email'] . "'>" . "</td>
                          <td>" .
                          $selector
                          .
                          "</td> 
                          <td> <input class='mod' type='submit' name='edit' value='Modificar'>
                               <input class='mod' type='submit' name='delete' value='Eliminar'>
                          </form> 
                          </tr>";
            }
        }

        $conn->close();
        ?>
    </table>
    </div>
    <a href="pag-principal.php">
        <button>Página Principal</button>
     </a>






</body>

</html>