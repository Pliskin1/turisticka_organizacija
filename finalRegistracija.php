<?php
  session_start();
include 'database.php';


$prijava = $_POST['prijava'];
$odjava = $_POST['odjava'];
$stanodavac = $_POST['stanodavac'];
$idg =$_SESSION['sky'];
$idk =$_SESSION['id'];
$godine = $_SESSION['godine'];
$oslobodjenPlacanja = $_POST['oslobodjenPlacanja'];
$vrstaIsprave =  $_SESSION['vrstaIsprave'];


$predsql1 = "SELECT boravisnaTaksaMaloljetni
            FROM stanodavac, grad
            WHERE stanodavac.ids = '$stanodavac' AND grad.gid = stanodavac.grad";
$predresult1 = $conn -> query($predsql1);
$predrow1 = $predresult1 -> fetch_assoc();
$taksaMaloljetni = $predrow1['boravisnaTaksaMaloljetni'];

$predsql2 = "SELECT boravisnaTaksaPunoljetni
            FROM stanodavac, grad
            WHERE stanodavac.ids = '$stanodavac' AND grad.gid = stanodavac.grad";
$predresult2 = $conn -> query($predsql2);
$predrow2 = $predresult2 -> fetch_assoc();
$taksaPunoljetni = $predrow2['boravisnaTaksaPunoljetni'];

if($godine < 12){
  $cijena = 0;
}else if($godine >=12 && $godine < 18 ){
  $cijena = $taksaMaloljetni;
}else{
  $cijena = $taksaPunoljetni;
}

$datetime1 = strtotime($prijava);
$datetime2 = strtotime($odjava);

$secs = $datetime2 - $datetime1;// == <seconds between the two times>

$days = $secs / 86400;
$total= $days * $cijena;


if(empty($stanodavac)){
  header("Location: registracija.php?error=stanodavac");
  exit();
}

if($days < 1){
  header("Location: registracija.php?error=date");
  exit();
}

if($vrstaIsprave == 1 && $days > 30){
  header("Location: registracija.php?error=licnaKarta");
  exit();
}

if($vrstaIsprave == 2 && $days > 90){
  header("Location: registracija.php?error=pasos");
  exit();
}

$presql = "SELECT zaduzenje FROM stanodavac where ids ='$stanodavac'";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();
$zaduzenje = $row['zaduzenje'];
//echo $zaduzenje;

$zaduzenje = ($zaduzenje + $total);
if(isset($oslobodjenPlacanja)){
  $zaduzenje = 0;
  $total = 0;
}

$postsql = "UPDATE stanodavac SET zaduzenje = '$zaduzenje' WHERE ids ='$stanodavac'";
$result = mysqli_query($conn,$postsql);
/*if($toDate <= $fromDate){
  header("Location: registracija.php?insert=error");
}else{*/
/*
echo $prijava;
echo "<br>";
echo $odjava;
echo "<br>";
echo $stanodavac;
echo "<br>";
echo $idg;
echo "<br>";
echo $idk;
echo "<br>";
echo $total;*/
$sql = "INSERT INTO iznajmljivanje (datumPrijave,datumOdjave,idk,ids,idg,ukupnaCijena,aktivno) VALUES ('$prijava','$odjava','$idk','$stanodavac','$idg','$total',1)";
$result = mysqli_query($conn,$sql);
header("Location: iznajmljivanja?insert=success");
//print_r($days);
//header("Location: registracija.php?insert=success");
//}

?>
