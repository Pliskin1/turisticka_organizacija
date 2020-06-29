<?php
session_start();
include 'database.php';

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$korisnickoIme = $_POST['korisnickoIme'];
$staraLozinka = $_POST['staraLozinka'];
$novaLozinka = $_POST['novaLozinka'];
$idk = $_SESSION['id'];


$presql = "SELECT * FROM korisnik where korisnickoIme = '$korisnickoIme' and idk !='$idk'";
$preresult = $conn ->query($presql);
$row = $preresult -> fetch_assoc();
$userCheck = mysqli_num_rows($preresult);
if($userCheck > 0){
 header("Location: profil.php?error=user");

  exit();
}





$sql = "SELECT * FROM korisnik where idk= '$idk'";
$result = $conn -> query($sql);
$row2 = $result -> fetch_assoc();
$passwordCheck = mysqli_num_rows($result);

$hash_old = $row2['lozinka'];
$hash_password = password_verify($staraLozinka, $hash_old);



 if($hash_password != 1){
 header("Location: profil.php?error=oldPass");
  exit();
}else{
$finLozinka = password_hash($novaLozinka, PASSWORD_DEFAULT);
$_SESSION['korisnickoIme'] = $korisnickoIme;
  $finSql = "UPDATE korisnik SET ime ='$ime',prezime = '$prezime', korisnickoIme = '$korisnickoIme',  lozinka = '$finLozinka' WHERE idk = '$idk' ";
  $finresult = mysqli_query($conn, $finSql);
 header("Location: profil.php?update=success");

}




 ?>
