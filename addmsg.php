<?php

session_start();

$send=$_SESSION['username'];
$msg=$_POST['sms'];
$user=$_POST['user'];
$id=$_POST['id'];


date_default_timezone_set("Asia/Kolkata");
$dt=date("Y-m-d H:i:s");
$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="INSERT INTO `messages` (`dat`,`msg`,`sen`,`whom`,`cole1`,`stat`) VALUES ('$dt','$msg','$send','$user','$id','unread');";
mysqli_query($db,$sql);
 
$output='';





$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="SELECT * FROM `messages` WHERE sen='$send' AND whom='$user' OR  whom='$send' AND sen='$user' ORDER BY dat ASC  ;";
$res=mysqli_query($db,$sql);
if($res)

{
 while($row=mysqli_fetch_assoc($res)) 
{
   $tw=$row['sen'];
   $ft=$row['whom'];
   $mss=$row['msg'];
   if(($tw==$user)&&($ft==$send))
   {
$output.='<div class="row" style="background:white; margin:10px; padding:10px; width:50%; border-radius:10px; ">
<div style:"color:black;  " class="comli col-sm-12"><a>'.$mss.'</a></div>
</div>
';
   }

   else if(($tw==$send)&&($ft==$user))
   {
$output.='<div class="row" style="background:rgb(249, 197, 28); margin:10px; float:right; padding:10px; border-radius:10px; width:50%; ">
<div style:"color:black;  " class="comli col-sm-12"><a>'.$mss.'</a></div>
</div>
';
   }






}

}

echo $output;

?>

