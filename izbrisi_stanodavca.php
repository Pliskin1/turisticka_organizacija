<?php
session_start();
include 'database.php';


$stanodavac = $_POST['Bstanodavac_id'];
echo $stanodavac;
if(isset($stanodavac)){
  $sql = "UPDATE stanodavac SET aktivan = 0 WHERE ids='$stanodavac'";
  $result = mysqli_query($conn, $sql);
  header("Location: stanodavci.php?delete=success");


}

 ?>
