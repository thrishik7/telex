<?php
session_start();
$id=$_POST['id'];
$user=$_POST['user'];
$usernamed=$_SESSION['username'];

$dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql="DELETE FROM `connect` WHERE user='$user';";
mysqli_query($dba,$sql);
?>