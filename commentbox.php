<?php
session_start();
$id=$_POST['id'];
$user=$_POST['user'];
$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
$sql="SELECT * FROM `comment` WHERE stat='$id'";
$result=mysqli_query($db,$sql);







$output= '<div id="user'.$id.'" class="user_dialog" >

<div class="row">

<div class="comli col-sm-12" >
<div class="mamai">
<p>
<button title="close"  type="button" onclick="cutma('.$id.');" style="background:none; width:30px; border:none;" ><strong><i class="far fa-times-circle w3-large"></i></strong></button>
</p>
  </div></div>  </div>


<div style="height:300px;  margin:20px; background:rgb(255, 255, 255);  overflow-y: scroll; margin-bottom:24px; padding :26px;" class="chat_history" data-touserid="'.$id.'" id="chat_history_"'.$id.'">



';
if($result)
{
while($row=mysqli_fetch_assoc($result))
{
   $comment=$row['msg'];
   $userc=$row['user'];
   $dat=$row['dat'];
 
   $dba= mysqli_connect('localhost','root','',$userc)or die("could not connect database..");
   $sql="SELECT `dp` FROM `profile` WHERE id='1';";
   $resu=mysqli_query($dba,$sql);
   if($resu)
   {
     $rowq=mysqli_fetch_assoc($resu);
     $ima=$rowq['dp'];
     $image='images/'.$ima;
   }



  $output.='
  
  <div class="row">
  <div class="comli col-sm-12"><p><img src="'.$image.'"  height="30" width="30" style="border-radius: 50%;" id="display profile"/> <strong>'.$userc.'</strong>    <a>'.$comment.'</a>     <a style="float:right; font-style:italic;">'.$dat.'</a></p>
  
</div>
  </div>
  
  
  ';





}

}
else
{
    $output.='
  
    <div class="row">
    <div class="comli col-sm-12"><a>No comments yet</a></div></div>';
}


$output.='</div>
</div>';
  

echo $output;

















?>