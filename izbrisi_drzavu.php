<?php
session_start();
include 'database.php';

$id = $_POST['idd'];

$sql = "UPDATE drzava SET aktivna = 0 WHERE idd='$id'";
$result = mysqli_query($conn, $sql);
header("Location: drzave.php?delete=success");

 ?>
