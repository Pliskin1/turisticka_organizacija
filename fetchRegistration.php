<?php
session_start();
include 'database.php';

$id = $_POST['idiz'];
if(isset($id)){
  $sql = "SELECT * FROM iznajmljivanje where idiz ='$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  echo json_encode($row);
}
 ?>
