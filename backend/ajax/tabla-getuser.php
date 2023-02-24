<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table-getuser</title>
</head>

<style>
    
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
    width: 200px;
    cursor: default;
}

td {
    position: relative;
    cursor: default;
}

 td:hover:before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: -9999px;
  bottom: -9999px;
  background-color: rgba(255, 255, 255, 0.2);
  z-index: -1;
} 

tr:hover {
  background-color: rgba(255, 255, 255, 0.3);
}
</style>

<body>
    <?php 
    // Recogemos las variables enviadas por GET

    $q = "%" . $_GET['q'] . "%";

    // realizamos la conexión en la BD
    $conn = mysqli_connect('localhost', 'root', '1234');

    mysqli_select_db ($conn, 'formulariosphp');
    $sql = "SELECT * FROM registros WHERE name LIKE '$q' OR email LIKE '$q' ORDER BY id ASC ";
    $result = mysqli_query($conn, $sql);

    // Imprimimos los datos en una tabla

    echo "<table>";

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
           

            if (true) {
                if ($row['usertype'] == 'admin') {
                    $user1 = 'admin';
                    $user2 = 'user';
                } else {
                    $user1 = 'user';
                    $user2 = 'admin';
                }
                $selector = "<select name='usertype'>
            <option name='usertype' value='" . $user1 . "'>" . $user1 . "</option>
            <option name='usertype' value='" . $user2 . "'>" . $user2 . "</option>
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
    
    
   echo "</table>";

   mysqli_close($conn);

    ?>
</body>

</html>