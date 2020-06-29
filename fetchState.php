<?php
session_start();
include 'database.php';
//$naziv = $_POST['naziv'];
$drzava = $_POST['drzava_id'];

if(isset($drzava)){
$sql = "SELECT * FROM drzava where idd = ".$drzava." ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

}

/*$sql2 = "SELECT * FROM drzava WHERE naziv = $naziv ";
$result2 = $conn -> query($sql2);
$row2 = $result2 -> fetch_assoc();
$stateCheck = mysqli_num_rows($result2);
if($stateCheck > 0){
  header("Location: drzave.php?error=state");
  exit();
}*/
echo json_encode($row);
 ?>
