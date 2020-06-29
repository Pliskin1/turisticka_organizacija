<?php
session_start();
include 'database.php';
$gost = $_POST['gost_id'];
if(isset($gost)){
  $sql = "SELECT * FROM gost where idg = ".$gost." ";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  echo json_encode($row);
}

?>
