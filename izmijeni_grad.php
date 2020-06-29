<?php
session_start();
include 'database.php';

$naziv = $_POST['nazivP'];
$boravisnaTaksaMaloljetni = $_POST['boravisnaTaksaMaloljetniP'];
$boravisnaTaksaPunoljetni = $_POST['boravisnaTaksaPunoljetniP'];
$id = $_POST['grad_id'];



$presql = "SELECT * FROM grad where naziv = '$naziv' AND gid !='$id' AND aktivan = 1";
$preresult = $conn -> query($presql);
$row = $preresult -> fetch_assoc();
$cityCheck = mysqli_num_rows($preresult);
if($cityCheck > 0){
  header("Location: gradovi.php?error=city");
  exit();
}
$sql = "UPDATE grad SET naziv = '$naziv',boravisnaTaksaMaloljetni ='$boravisnaTaksaMaloljetni', boravisnaTaksaPunoljetni='$boravisnaTaksaPunoljetni' WHERE gid ='$id'";
$result = mysqli_query($conn, $sql);
header("Location: gradovi.php?edit=success");







 ?>
