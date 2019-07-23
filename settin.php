<?php 
session_start();
$usernamed=$_SESSION['username'];

$output='
<div style="height:140px; width:200%;   margin:0px; background:rgb(255, 255, 255); margin-bottom:5px; padding:23px;">

<div class="row" style="float:left;"><button  type="button" onclick="privatee()" style="color:black; background:none; border:none; margin:22px; " ><i class="fa fa-lock" style="font-size:12px"></i><b>  PRIVATE</b></button></div>
<div class="row" style="float:left;"><button href="profile.php" style="color:black; background:none; border:none; margin:22px;"><i class="fa fa-trash" style="font-size:12px"></i><b> DELETE_ACCOUNT</b></button></div>

</div>
';


echo $output;


?>