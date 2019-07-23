<?php

session_start();
$id=$_POST['id'];
$user=$_POST['groupname'];


$pctm='chatting'.$_POST['id'];
$pctmb='wow'.$_POST['id'];

?>

<div id="user<?php echo $id?>" class="user_dialog" title="<?php echo $user ?>">


<div class="row">

<div class="comli col-sm-12" >
<div class="mamai">
<p>
<button title="close"  type="button" onclick="cutma(<?php echo $id ?>);" style="background:none;margin-left:20px;  border:none;" ><strong><i class="far fa-times-circle w3-large"></i></strong></button>
</p>
  </div></div>  </div>



<div style="height:400px; margin:20px; background:rgb(249, 197, 28, 0.3); border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding :16px;" class="chat_history" data-touserid="<?php echo $id?>" id="chat_history_<?php echo $id?>">

<div id=<?php echo $pctm ;?>>


<?php














$send=$_SESSION['username'];

$output='';



 $groupname=$user;








    $dv=mysqli_connect('localhost','root','',$groupname)or die("could not connect database.."); 
    $sqlb="SELECT * FROM `connect`";
    $resd=mysqli_query($dv,$sqlb);
    if($resd){
   while( $rqc=mysqli_fetch_assoc($resd)){
    $background_colors = array('green', 'blue', 'red', 'orange', 'pink', 'gray', 'brown', 'purple');

    $color= $background_colors[array_rand($background_colors)];

      $usss=$rqc['users'];
       $_SESSION[$usss]=$color;       


}
    }











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

</div>
</div>
<div class="col-sm-12">
<input placeholder="Type a message" type="text" name="chat_message_<?php echo $id?>" id=<?php echo $pctmb?> style="padding:10px ;margin-left:34px; width:78%; background:none; border: none;"/>


<button type="button" onclick="msg('<?php echo $id ?>','<?php echo $user ?>');" style="float:right; margin-right:20px;"   name="send_chat" id="<?php echo $id ?>" class="btn btn-warning send_chat"><i style="color:white; " class="fa fa-send w3-small" ></i></button>
</div></div>