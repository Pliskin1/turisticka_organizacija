<?php

session_start();
include 'database.php';

$ime = $_POST['imeI'];
$prezime = $_POST['prezimeI'];
$datum = $_POST['datumI'];
$jmbg = $_POST['jmbgI'];
$adresa = $_POST['adresaI'];
$grad = $_POST['gradI'];
$ids = $_POST['stanodavac_id'];



$presql = "SELECT * FROM stanodavac WHERE jmbg ='$jmbg' AND ids != '$ids' AND aktivan = 1";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();
$landlordCheck = mysqli_num_rows($preresult);
if($landlordCheck > 0){
  header("Location: stanodavci.php?error=jmbg");
  exit();
}else{
  $sql = "UPDATE stanodavac SET ime = '$ime' , prezime = '$prezime' , datumRodjenja = '$datum' , jmbg = '$jmbg', adresa = '$adresa', grad='$grad' WHERE ids ='$ids'";
  $result = mysqli_query($conn, $sql);
  header ("Location: stanodavci.php?update=success");
}

 ?>
