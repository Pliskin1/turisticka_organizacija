<?php
session_start();
include 'database.php';
$korisnik = $_POST['korisnik_id'];
if(isset($korisnik)){
  $sql = "SELECT * FROM korisnik WHERE idk='$korisnik'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  echo json_encode($row);

}


 ?>
