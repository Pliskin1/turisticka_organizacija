<?php
session_start();
include 'database.php';

$naziv = $_POST['naziv'];
$boravisnaTaksaMaloljetni = $_POST['boravisnaTaksaMaloljetni'];
$boravisnaTaksaPunoljetni = $_POST['boravisnaTaksaPunoljetni'];

/*echo $naziv;
echo "<br>";
echo $boravisnaTaksaMaloljetni;
echo "<br>";
echo $boravisnaTaksaPunoljetni;
echo "<br>";*/

$presql = "SELECT * FROM grad where naziv = '$naziv' and aktivan = 1";
$preresult = $conn -> query ($presql);
$row = $preresult -> fetch_assoc();
$cityCheck = mysqli_num_rows($preresult);
if($cityCheck > 0){
  header("Location: gradovi.php?error=city");
  exit();
}

$sql = "INSERT INTO grad (naziv,boravisnaTaksaMaloljetni,boravisnaTaksaPunoljetni,aktivan) VALUES ('$naziv','$boravisnaTaksaMaloljetni','$boravisnaTaksaPunoljetni',1)";
$result = mysqli_query($conn,$sql);
header("Location: gradovi.php?insert=success");

 ?>
