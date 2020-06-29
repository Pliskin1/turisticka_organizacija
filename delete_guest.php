<?php
include 'database.php';
session_start();




$id = $_GET['idg'];
$_SESSION['sky'] = $id;
$sql = 'UPDATE gost set aktivan=0 where idg='.$_SESSION['sky'];
$result = mysqli_query($conn,$sql);
header("Location: pocetna.php?delete=success");



 ?>
