<?php
session_start();
include 'database.php';
  $ime = $_POST['ime'];
  $prezime = $_POST['prezime'];
  $datum = $_POST['datum'];
  $jmbg= $_POST['jmbg'];
  $adresa = $_POST['adresa'];
  $grad = $_POST['grad'];


$presql = "SELECT * FROM stanodavac where jmbg = '$jmbg' and aktivan = '1' ";
$preresult = $conn -> query($presql);
$jmbgCheck  = mysqli_num_rows($preresult);
if($jmbgCheck > 0){
header("Location: stanodavci.php?error=jmbg");
  exit();
}else{

$sql = "INSERT INTO stanodavac (ime,prezime,datumRodjenja,jmbg,adresa,grad,aktivan) VALUES ('$ime','$prezime','$datum','$jmbg','$adresa','$grad',1)";
$result = mysqli_query($conn,$sql);
header("Location: stanodavci.php?insert=success");

}
 ?>
