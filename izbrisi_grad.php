<?php
session_start();
include 'database.php';

$grad_id = $_POST['Bgrad_id'];
$sql = "UPDATE grad SET aktivan = 0 WHERE gid ='$grad_id' ";
$result = mysqli_query($conn, $sql);
header ("Location: gradovi.php?delete=success");

 ?>
