<?php

session_start();

$lol = $_GET['idg'];
$_SESSION['sky'] = $lol;

header("Location: registracija");


 ?>
