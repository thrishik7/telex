<?php
session_start();
$user=$_POST['user'];
$_SESSION['viewp']=$user;
$bay=$_SESSION['viewp'];
header("location: viewp.php?ID=$bay");

?>