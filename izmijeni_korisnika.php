<?php
session_start();
include 'database.php';
$ime = $_POST['imeK'];
$prezime = $_POST['prezimeK'];
$korisnickoIme = $_POST['korisnickoImeK'];
$lozinka = $_POST['lozinkaK'];
$novaLozinka1 = $_POST['lozinkaK1'];
$novaLozinka2 = $_POST['lozinkaK2'];
$uloga = $_POST['ulogaK'];
$id = $_POST['korisnik_id'];

/*echo $ime;
echo "<br>";
echo $prezime;
echo "<br>";
echo $korisnickoIme;
echo "<br>";
echo $lozinka;
echo "<br>";
echo $novaLozinka1;
echo "<br>";
echo $novaLozinka2;
echo "<br>";
echo $id;
echo "<br>";
echo $uloga;*/
$presql = "SELECT * FROM korisnik WHERE korisnickoIme = '$korisnickoIme' and idk != '$id'";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();
$userCheck = mysqli_num_rows($preresult);
if($userCheck > 0){
  header("Location: korisnici.php?error=user");
  exit();
}

$sql = "SELECT * FROM korisnik WHERE idk ='$id'";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();
$passwordCheck = mysqli_num_rows($result);

$hash_old = $row['lozinka'];
$hash_password = password_verify($lozinka, $hash_old);

if($hash_password != 1){
header("Location: korisnici.php?error=oldPass");
 exit();
}
if(empty($novaLozinka1) || empty($novaLozinka2)){
  header("Location: korisnici.php?error=noPass");
  exit();
}


if($novaLozinka1 != $novaLozinka2){
  header("Location: korisnici.php?error=newPass");
  exit();
}else{
  if($id == $_SESSION['id']){
  $_SESSION['korisnickoIme'] = $korisnickoIme;
  $_SESSION['idtk'] = $uloga;
  }
  $finLozinka = password_hash($novaLozinka1, PASSWORD_DEFAULT);
  $finSql = "UPDATE korisnik SET ime='$ime', prezime='$prezime', korisnickoIme='$korisnickoIme', lozinka='$finLozinka', idtk='$uloga' WHERE idk = '$id' ";
  $finresult =  mysqli_query($conn, $finSql);

  header("Location: korisnici.php?update=success");
}

 ?>
