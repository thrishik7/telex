<?php 
session_start();
$id=$_POST['id'];
echo $id;
$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="DELETE FROM `post` WHERE id='$id';";
mysqli_query($db,$sql);
echo $id;
?>