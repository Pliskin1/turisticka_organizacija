<?php
session_start();
include 'database.php';
 $ime = $_POST['ime'];
 $prezime = $_POST['prezime'];
 $korisnickoIme = $_POST['korisnickoIme'];
 $lozinka = $_POST['lozinka'];
 $tipKorisnika = $_POST['uloga'];






$presql = "SELECT * FROM korisnik where korisnickoIme='$korisnickoIme'";
$preresult = $conn -> query($presql);
$userCheck = mysqli_num_rows($preresult);
if($userCheck > 0){
  header("Location:korisnici.php?error=user");
  exit();
}else{
  $hash = password_hash($lozinka, PASSWORD_DEFAULT);

  $sql ="INSERT INTO korisnik (ime,prezime,korisnickoIme,lozinka,idtk,aktivan) VALUES ('$ime','$prezime','$korisnickoIme','$hash','$tipKorisnika',1)";
  $result = mysqli_query($conn,$sql);
  header("Location:korisnici.php?insert=success");
}








?>
