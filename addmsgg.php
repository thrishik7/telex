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




$send=$_SESSION['username'];

$output='';



 $groupname=$user;




 $dbx= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
 $sql="SELECT * FROM `messages` ORDER BY dat ASC;";

 $res=mysqli_query($dbx,$sql);
 if($res)
 
 {

    while($row=mysqli_fetch_assoc($res)) 
    {
       $tw=$row['sen'];
       $ft=$row['whom'];
    
       $mss=$row['msg'];
    

if($ft==$groupname){
 $dv=mysqli_connect('localhost','root','',$groupname)or die("could not connect database.."); 
 $sqlb="SELECT * FROM `connect` WHERE users='$tw' AND NOT stat='request';";
 $resd=mysqli_query($dv,$sqlb);
 if($resd){
   $rq=mysqli_fetch_assoc($resd);

    $usss=$rq['users'];











   if($tw!=$send)
   {
   if(($tw==$usss)&&($ft==$groupname))
   {
$output.='<div class="row" style="background:white; margin:10px; padding:10px; width:50%; border-radius:10px; ">

<div style="color:'.$_SESSION[$tw].';  " class="comli col-sm-12"><strong>'.$tw.'</strong></div>
<div style:"color:black;  " class="comli col-sm-12"><a>'.$mss.'</a></div>
</div>
';
   }}

   else if($tw==$send)
   {
$output.='<div class="row" style="background:#5CDB95; margin:10px; float:right; padding:10px; border-radius:10px; width:50%; ">
<div style="color:black;" class="comli col-sm-12"><a>'.$mss.'</a></div>
</div>
';
   }













 }}
}





 }

echo $output;


?>