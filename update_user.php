<?php
include('connection.php');
$con = connection();

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($con, "SELECT id, name, lastname, username, email FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuarios</title>
</head>
<body>
    <div>
            <form action="edit_user.php" method="POST">
                <h1>Editar usuario</h1>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="text" name="name" placeholder="nombre" value="<?= $row['name'] ?>">
                <input type="text" name="lastname" placeholder="apellido" value="<?= $row['lastname'] ?>">
                <input type="text" name="username" placeholder="usuario" value="<?= $row['username'] ?>">
                <input type="text" name="email" placeholder="correo" value="<?= $row['email'] ?>">
                <input type="password" name="password" placeholder="Nueva contraseña (vacío = no cambiar)">

                <input type="submit" value="actualizar información">
            </form>
    </div>
</body>
</html>