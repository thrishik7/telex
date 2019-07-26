<?php
session_start();
$usernamed=$_SESSION['username'];


$db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql="UPDATE profile  SET `post`='aprivate' WHERE id='1';";
mysqli_query($db, $sql);

$output='<div class="row" style="float:left;"><button  type="button" onclick="privatee()" style="color:black; background:none; border:none; margin:22px; " ><i class="fa fa-lock" style="font-size:12px"></i><b>  PRIVATE</b></button></div>
';
echo $output;

?>