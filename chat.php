<?php

session_start();

$id=$_POST['id'];
$user=$_POST['user'];
$usar=$user;

$pctm='chatting'.$_POST['id'];
$pctmb='wow'.$_POST['id'];
$usar=$user;
$dba= mysqli_connect('localhost','root','', $usar)or die("could not connect database.."); 
$sql="SELECT * FROM `profile`";
$results=mysqli_query($dba, $sql); 
$rows=mysqli_fetch_array($results);
$dp =$rows['dp'];
$img='images/'.$dp;







?> 
<?php $idc='user_model_details'.$id ?>


<div class="baaai">
      <button  type="button" style="background:none; border:none; display:block; " onclick="make_chat_dialog_box('<?php echo $id ?> ','<?php echo $usar ?>')" >

      <div class= "col-sm-12">
  <table style="border:none; background:none">
  
      <tr>
    <th><img src="<?php echo $img ?>"/></th>
    <th ><b><?php echo $usar ?></b></th>
    <th style="width:100px;"><button type="button" style="background:none; border:none; " onclick="triggerClick('<?php echo $usar ?>')" ><i class="fa fa-camera" style="font-size:24px"></i></button>
    

</th>
   <th>

   <button type="submit"  style="float:right; margin-right:20px;"   name=<?php echo "send_chat".$id ?> id="<?php echo $id ?>" class="btn btn-warning send_chat"><i style="color:white; " class="fa fa-send w3-small" ></i></button>

   </th>


  </tr></table>


        <?php $idc='user_model_details'.$id ?>
      
      
      </div></button>  </div> 
      <?php $idv='usero'.$id ?>
<div id=<?php echo $idv?> class="user_dialog" title="<?php echo $user ?>">






<div class="row">

<div class="comli col-sm-12" >
<div class="mamai">
<p>
<button title="close"  type="button" onclick="cutma('<?php echo $id ?>','<?php echo $user ?>');" style="background:none;margin-left:20px;  border:none;" ><strong><i class="far fa-times-circle w3-large"></i></strong></button>
</p>
  </div></div>  </div>



<div style="height:400px; margin:20px; background:rgb(249, 197, 28, 0.3); border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding :16px;" class="chat_history" data-touserid="<?php echo $id?>" id="chat_history_<?php echo $id?>">

<div id=<?php echo $pctm ;?>>


<?php




$send=$_SESSION['username'];

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
   $kk=$row['cole2'];
   $mss=$row['msg'];   $dat=$row['dat'];

if($kk!=3){
   if(($tw==$user)&&($ft==$send))
   {
$output.='<div class="row" title="'.$dat.'"  style="background:white; margin:10px; padding:10px; width:50%; border-radius:10px; ">
<div style:"color:black;  " class="comli col-sm-12"><a>'.$mss.'</a></div>
</div>
';
   }

   else if(($tw==$send)&&($ft==$user))
   {
$output.='<div class="row" title="'.$dat.'" style="background:rgb(249, 197, 28); margin:10px; float:right; padding:10px; border-radius:10px; width:50%; ">
<div style:"color:black;  " class="comli col-sm-12"><a>'.$mss.'</a></div>
</div>
';
   }

}

else
{


   if(($tw==$user)&&($ft==$send))
   {

   $img='post/'.$mss;

   $output.='
   <div class="row" title="'.$dat.'" style="background:white; margin:10px; padding:0; border-radius:10px;  float:left; text-algin:center; ">
   
   <div class="baaaia">
   <img src="'.$img.'" />

   
   </div>
   </div>';
   }
   else if(($tw==$send)&&($ft==$user))
   {


      $img='post/'.$mss;

      $output.='
      <div class="row" title="'.$dat.'" style="background:rgb(249, 197, 28); margin:10px; padding:0; float:right; border-radius:10px; text-algin:center; ">
      
      <div class="baaaia">
      <img src="'.$img.'" />
   
      
      </div>
      </div>';


   } 

}





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


