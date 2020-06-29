<?php
session_start();
include 'database.php';

$id = $_POST['stanodavac_id'];
$razduzenje = $_POST['razduzenje'];

if($razduzenje == 0){
  header("Location: zaduzenja.php?error=update");
  exit();
}

$presql = "SELECT zaduzenje FROM stanodavac WHERE ids = '$id'";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();

$zaduzenje = $row['zaduzenje'];
$zaduzenje= ($zaduzenje - $razduzenje);

$sql = "UPDATE stanodavac SET zaduzenje = '$zaduzenje' WHERE ids ='$id'";
$result = mysqli_query($conn, $sql);
header("Location: zaduzenja.php?edit=success");
 ?>
