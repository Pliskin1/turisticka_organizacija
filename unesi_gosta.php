<?php
session_start();
include 'database.php';

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$pol = $_POST['pol'];
$datum = $_POST['datum'];
$drzava = $_POST['drzava'];
$vrstaPutneIsprave = $_POST['vrsta'];
$brIsprave = $_POST['brIsprave'];
$datumVazenjaPutneIsprave = $_POST['putnaIsprava'];

/*echo $ime;
echo "<br>";
echo $prezime;
echo "<br>";
echo $pol;
echo "<br>";
echo $datum;
echo "<br>";
echo $drzava;
echo "<br>";
echo $vrstaPutneIsprave;
echo "<br>";
echo $brIsprave;
echo "<br>";
echo $datumVazenjaPutneIsprave;
echo "<br>";*/

$presql = "SELECT * FROM gost WHERE brojPutneIsprave = '$brIsprave' ";
$preresult = $conn -> query($presql);
$guestCheck = mysqli_num_rows($preresult);
if($guestCheck > 0){
  header("Location:pocetna.php?error=brIsprave");
  exit();
}else{
    $sql = "INSERT INTO gost (ime, prezime , pol , datumRodjenja, drzavljanstvo, vrstaPutneIsprave, brojPutneIsprave, datumVazenjaPutneIsprave, aktivan)
            VALUES ('$ime','$prezime','$pol','$datum','$drzava','$vrstaPutneIsprave','$brIsprave','$datumVazenjaPutneIsprave',1)";
    $result = mysqli_query($conn,$sql);
    header("Location:pocetna.php?insert=success");
}
//$sql="UPDATE gost set ime='$ime' , prezime='$prezime' , pol='$pol' , datum='$datum' , drzava='$drzava' ,"

 ?>
