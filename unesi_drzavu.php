<?php
session_start();
include 'database.php';

$naziv = $_POST['ime'];
$presql = "SELECT * FROM drzava WHERE naziv = '$naziv' AND aktivna = 1";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();
$stateCheck = mysqli_num_rows($preresult);
if($stateCheck > 0){
  header("Location: drzave.php?error=country");
  exit();
}

$sql = "INSERT INTO drzava (naziv, aktivna) VALUES ('$naziv',1) ";
$result = mysqli_query($conn, $sql);
header("Location: drzave.php?insert=success");



 ?>
