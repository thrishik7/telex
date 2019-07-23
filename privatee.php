<?php
session_start();
$usernamed=$_SESSION['username'];


$db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql="UPDATE profile  SET `post`='private' WHERE id='1';";
mysqli_query($db, $sql);





?>