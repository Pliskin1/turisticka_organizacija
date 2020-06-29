<?php

session_start();

$lol = $_GET['idiz'];
$_SESSION['sky2'] = $lol;

header("Location: racun");


 ?>
