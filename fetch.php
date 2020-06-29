<?php
session_start();
include 'database.php';
$stanodavac = $_POST['stanodavac_id'];
if(isset($stanodavac)){
$sql = "SELECT * FROM stanodavac, grad where ids = $stanodavac and grad = gid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo json_encode($row);
}
/*$presql = "SELECT zaduzenje FROM stanodavac where ids ='$stanodavac'";
$preresult = $conn -> query($presql);
$prerow = $preresult -> fetch_assoc();
$zaduzenje = $prerow['zaduzenje'];

$razduzenje = $_POST['razduzenje'];
$zaduzenje = ($zaduzenje - $razduzenje);

$postsql = "UPDATE stanodavac SET zaduzenje = '$zaduzenje' WHERE ids ='$stanodavac'";
$preresult = mysqli_query($conn,$postsql);*/

 ?>
