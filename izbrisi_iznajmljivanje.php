<?php
session_start();
include 'database.php';

$id = $_POST['idiz'];

$sql = "UPDATE iznajmljivanje SET aktivno = 0 WHERE idiz='$id'";
$result = mysqli_query($conn, $sql);
header("Location: iznajmljivanja.php?delete=success");

 ?>
