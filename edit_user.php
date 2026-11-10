<?php
include('connection.php');
$con = connection();

$id       = (int) $_POST['id'];
$name     = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email    = $_POST['email'];

if ($_POST['password'] !== '') {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE users SET name = ?, lastname = ?, username = ?, password = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $name, $lastname, $username, $password, $email, $id);
} else {
    $sql = "UPDATE users SET name = ?, lastname = ?, username = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $lastname, $username, $email, $id);
}

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;