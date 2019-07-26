<?php 

session_start();

$send=$_SESSION['username'];
$user=$_POST['user'];
$id=$_POST['id'];
$_SESSION['idim']=$id;
$_SESSION['userm']=$user;



?>