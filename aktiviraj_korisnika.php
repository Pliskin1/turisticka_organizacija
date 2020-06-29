<?php
session_start();
include 'database.php';

$id = $_POST['Akorisnik_id'];
$presql = "SELECT aktivan FROM korisnik WHERE idk='$id'";
$preresult = $conn -> query($presql);
$row = $preresult ->fetch_assoc();
$status = $row['aktivan'];

if($status == 1){
  $sql = "UPDATE korisnik set aktivan = 0 WHERE idk='$id'";
  $result = mysqli_query($conn,$sql);
  header("Location: korisnici.php?deaktiv=success");
}if($status == 0){
  $postsql = "UPDATE korisnik set aktivan = 1 WHERE idk='$id'";
  $postresult = mysqli_query($conn,$postsql);
  header("Location: korisnici.php?aktiv=success");
}


 ?>
