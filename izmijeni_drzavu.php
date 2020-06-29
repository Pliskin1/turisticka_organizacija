<?php
session_start();
include 'database.php';

$naziv = $_POST['naziv'];
$id = $_POST['drzava_id'];


$presql = "SELECT * FROM drzava where naziv = '$naziv' and aktivna= 1";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();
$stateCheck = mysqli_num_rows($preresult);
if($stateCheck > 0){
  header("Location: drzave.php?error=country");
  exit();
}


$sql = "UPDATE drzava set naziv='$naziv' WHERE idd = '$id'";
$result = mysqli_query($conn, $sql);
header("Location: drzave.php?edit=success");

 ?>
