<?php
session_start();
include 'database.php';
$ime = $_POST['imeI'];
$prezime = $_POST['prezimeI'];
$pol = $_POST['polI'];
$datum = $_POST['datumI'];
$drzava = $_POST['drzavaI'];
$vrstaIsprave = $_POST['vrstaI'];
$brojIsprave = $_POST['brIspraveI'];
$datumVazenjaPutneIsprave = $_POST['putnaIspravaI'];
$idg = $_POST['gost_id'];

$presql = "SELECT * FROM gost WHERE idg !='$idg' and brojPutneIsprave ='$brojIsprave'";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();
$guestCheck = mysqli_num_rows($preresult);
if($guestCheck > 0){
  header("Location: pocetna.php?error=brIsprave");
  exit();
}else{
  $sql = "UPDATE gost SET ime = '$ime',prezime ='$prezime', pol='$pol',datumRodjenja='$datum', drzavljanstvo='$drzava', vrstaPutneIsprave='$vrstaIsprave', brojPutneIsprave='$brojIsprave', datumVazenjaPutneIsprave='$datumVazenjaPutneIsprave' WHERE idg ='$idg'";
  $result = mysqli_query($conn, $sql);
  header("Location: pocetna.php?edit=success");
}


 ?>
