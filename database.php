<?php


$host = "localhost:3306";
		$usernamee = "root";
		$password = "";
		$database="TuristickaOrganizacija";
		$conn = mysqli_connect($host,$usernamee,$password,$database)or die("GRESKA " . mysqli_error($conn));
		mysqli_set_charset($conn,"utf8");

 ?>
