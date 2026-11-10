<?php
include('connection.php');

$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud php</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div>
        <form action="insert_user.php" method="POST">
            <h1>Crear usuario</h1>
            <input type="text" name ="name" placeholder ="Tu nombre">
            <input type="text" name ="lastname" placeholder ="Tu apellido">
            <input type="text" name ="username" placeholder ="Tu usuario">
            <input type="text" name="password" placeholder ="Tu contraseña">
            <input type="text" name="email" placeholder ="Tu correo">
            
            <input type="submit" value="agregar usuario">
        </form>
    </div>
    <div>
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>

                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row= mysqli_fetch_array($query)): ?>
                <tr>
                    <th><?= $row['id']?></th>
                    <th><?= $row['name']?></th>
                    <th><?= $row['lastname']?></th>
                    <th><?= $row['username']?></th>
                    <th><?= $row['password']?></th>
                    <th><?= $row['email']?></th>

                    <th><a href="update_user.php?id=<?= $row['id']?>">Editar</a></th>
                    <td>
                        <form action="delete_user.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>