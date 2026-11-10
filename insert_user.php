<?php
include('connection.php');
$con = connection();

$name     = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email    = $_POST['email'];

$sql = "INSERT INTO users (name, lastname, username, password, email) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $name, $lastname, $username, $password, $email);
mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;