<?php
session_start();
include 'database.php';
$stanodavac = $_POST['stanodavac_id'];
if(isset($stanodavac)){
  $sql = "SELECT * FROM stanodavac WHERE ids = '$stanodavac'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  echo json_encode($row);
}


 ?>
