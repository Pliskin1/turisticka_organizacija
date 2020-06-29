<?php
session_start();
include 'database.php';

$gost = $_POST['Bgost_id'];
$sql = "UPDATE gost SET aktivan = 0 WHERE idg ='$gost'";
$result = mysqli_query($conn, $sql);
header ("Location: pocetna.php?delete=success");

 ?>
