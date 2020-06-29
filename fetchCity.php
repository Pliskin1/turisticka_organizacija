<?php
session_start();
include 'database.php';
$grad = $_POST['grad_id'];
if(isset($grad)){
  $sql = "SELECT * FROM grad where gid = ".$grad." ";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  echo json_encode($row);
}


 ?>
