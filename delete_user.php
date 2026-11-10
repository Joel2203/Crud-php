<?php
include('connection.php');
$con = connection();

$id = (int) $_POST['id'];

$stmt = mysqli_prepare($con, "DELETE FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;