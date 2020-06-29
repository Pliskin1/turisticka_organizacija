<?php
session_start();
include 'database.php';

$datum = date("d-m-Y H:i:s");

$user = $_POST['user'];
$password = $_POST['lozinka'];

$presql = "SELECT idk,idtk,ime,prezime,korisnickoIme,lozinka,aktivan from korisnik where korisnickoIme = '$user' and aktivan=1";
$preresult = $conn-> query($presql);
$row = $preresult-> fetch_assoc();
$hash_pwd = $row['lozinka'];
$hash = password_verify($password, $hash_pwd);

if($hash == 0){

  header("Location: index.php?error=password");
 exit();

}else{
  $sql = "SELECT idk,idtk,ime,prezime,korisnickoIme,lozinka,aktivan FROM korisnik WHERE korisnickoIme='$user' and lozinka='$hash_pwd' and aktivan=1";
  $result = $conn->query($sql);
  if(empty($user) && empty($password)){
      header("Location: index.php?error=UPempty");
    }
  elseif(empty($user)){
  header("Location: index.php?error=Uempty");
  exit();
}elseif(empty($password)){
    header("Location: index.php?error=Pempty");
  exit();
  }elseif(!$row = mysqli_fetch_assoc($result)){

     header("Location: index.php?error=nouser");
     exit();



  }else{

    $_SESSION['id'] = $row['idk'];
    $_SESSION['korisnickoIme'] = $row['korisnickoIme'];
    $_SESSION['idtk'] = $row['idtk'];

    $tipKorisnika = $row['idtk'];
    $tip="";
    if($tipKorisnika == 2){
      $tip="administrator";
    }elseif($tipKorisnika == 1){
        $tip="korisnik";
    }else{
        $tip="inspektor";
    }

    $sql2 = "INSERT INTO logovi (korisnickoIme,tipKorisnika,datum) VALUES ('$user','$tip','$datum')";
    $result = mysqli_query($conn,$sql2);

if($row['idtk'] == 1){
    header("Location: pocetna");
  }else if($row['idtk'] == 2){
    header("Location: korisnici");
  }else{
    header("Location: zaduzenja");
  }
}
}


 ?>
