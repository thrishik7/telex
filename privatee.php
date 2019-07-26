<?php
session_start();
$usernamed=$_SESSION['username'];


$db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql="UPDATE profile  SET `post`='private' WHERE id='1';";
mysqli_query($db, $sql);



$output='<div class="row" style="float:left;"><button  type="button" onclick="aprivatee()" style="color:blue; background:none; border:none; margin:22px; " ><i class="fa fa-lock" style="font-size:12px"></i><b>  PRIVATE &#10003</b></button></div>';
echo $output;
?>