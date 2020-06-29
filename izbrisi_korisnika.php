<?php
session_start();
include 'database.php';

$id = $_POST['Bkorisnik_id'];
$sql ="DELETE FROM korisnik where idk = '$id'";
$result = mysqli_query($conn, $sql);
header("Location: korisnici.php?delete=success");


 ?>
