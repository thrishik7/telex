<?php
session_start();
$post=$_POST['post'];

$usernamed1=$_SESSION['username'];
$output='';
$output.='
<div class="row">
<div class="col-sm-4">
<div class="timelined" style="    padding: 10px;
width:480px;
margin: 10px;
margin-top:10px;
margin-bottom:10px;
background: white;" >
';
$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="SELECT * FROM `post` WHERE post='$post';";
$result=mysqli_query($db,$sql);
if($result)
{ $rows=mysqli_fetch_assoc($result);
    $im=$rows['post'];
    $capt=$rows['caption'];
    $dt=$rows['dat'];
    $user=$rows['user'];
    $post='post/'.$im;
   $pc=$rows['id'];
   $j="bp".$pc;
   $ps=$rows['id'];
   $pp='comment'.$pc;
   $pl='like'.$rows['id'];
   $pct=$rows['id'];
    $dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
    $sql="SELECT `dp` FROM `profile` WHERE id='1';";
    $resu=mysqli_query($dba,$sql);
    if($resu)
    {
      $rowq=mysqli_fetch_assoc($resu);
      $ima=$rowq['dp'];
      $image='images/'.$ima;
    }

    $popt='opt'.$rows['id']; 

}

$output.='
<div class="row">

<div class="comli col-sm-12" >
<div class="mamai">
<p>
<button  type="button" onclick="cutma();" style="background:none; width:30px; border:none;" ><strong><i class="far fa-times-circle w3-large"></i></strong></button>
</p>
  </div></div>  </div>
<div class="row">
<div class="comli col-sm-12" >
<div class="mamai">

    <p>'.$dt.' <strong>'.$capt.'</strong>

    <button  type="submit" onclick="delpp('.$pc.');" style="background:none; width:30px; border:none; color:rgb(23, 152, 192);" ><strong>remove_post</strong></button>
  </p>
</div>
</div> 
</div>






<div class="row">
<div class="col-sm-12" style="text-algin:center;">
<div class="mamay">
  
<p> <img src="'.$post.'"  height="280" width="455" /></p>
</div>
</div> </div>         



<div class="row">
<div class="col-sm-12 ">
<div class="mamay">

    <p><a href=""><strong>




';

    
   

$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="SELECT lik FROM `post` WHERE  id='$ps';";
$resug=mysqli_query($db,$sql);
if($resug){
$rowl=mysqli_fetch_assoc($resug);
$lik=$rowl['lik'];
}

    
    
    
    
    
    
    
    
    
  $output.=$lik.'</strong></a>Likes     <a href=""><strong>';
    
    
        
    

$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="SELECT comment FROM `post` WHERE  id='$ps';";
$resug=mysqli_query($db,$sql);
if($resug){
$rowl=mysqli_fetch_assoc($resug);
$likc=$rowl['comment'];
}

    
   
    
    
    
    
    
$output.=$likc.'
    </strong></a>Comments</p>
</div>
</div> </div>
</div></div>
<div class="col-sm-3">
<div style="height:430px; margin:10px;  background:rgb(255, 255, 255);  overflow-y: scroll;  padding :26px;" class="chat_history">
<div class="row">
<div class="col-sm-12" style="text-align:center; margin-bottom:10px;">
LIKED BY
</div>
</div>
';



$dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
$sql="SELECT DISTINCT user, dat FROM `notification` WHERE msg='$pc' AND kind='3'";
$result=mysqli_query($dba,$sql);
if($result)
{
    $is=1;
  while($rowk=mysqli_fetch_assoc($result))
{  
    $ud=$rowk['user'];
    $dat=$rowk['dat'];
    $dbab= mysqli_connect('localhost','root','',$ud)or die("could not connect database..");
    $sql="SELECT `dp` FROM `profile` WHERE id='1';";
    $resu=mysqli_query($dbab,$sql);
    if($resu)
    {
      $rowdic=mysqli_fetch_assoc($resu);
      $ima=$rowdic['dp'];
      $imagedic='images/'.$ima;
    }
  
$is++;

if($is%2==0)
{
    $output.='
  
    <div class="row" style="background:rgb(255,0,0,0.2); padding:5px;" >
    <div class="comli col-sm-12" ><p><img src="'.$imagedic.'"  height="30" width="30" style="border-radius: 50%;" id="display profile"/> <strong>'.$ud.'</strong>          <a style="float:right; font-style:italic;">'.$dat.'</a></p>
    
  </div>
    </div>
    
    
    ';
}
else
{

    $output.='
  
    <div class="row" style="background:rgb(255,0,0,0.08); padding:5px;" >
    <div class="comli col-sm-12" ><p><img src="'.$imagedic.'"  height="30" width="30" style="border-radius: 50%;" id="display profile"/> <strong>'.$ud.'</strong>          <a style="float:right; font-style:italic;">'.$dat.'</a></p>
    
  </div>
    </div>
    
    
    ';

} 
  


}


}











$output.='</div>
</div>';



$output.='
<div class="col-sm-5">
<div style="height:430px; margin:10px;  background:rgb(255, 255, 255);  overflow-y: scroll;  padding :26px;" class="chat_history">
<div class="row">
<div class="col-sm-12" style="text-align:center; margin-bottom:10px;">
COMMENTED BY
</div>
</div>
';



$dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
$sql="SELECT * FROM `comment` WHERE stat='$pc'";
$result=mysqli_query($dba,$sql);
if($result)
{
    $is=1;
  while($rowk=mysqli_fetch_assoc($result))
{  
    $comment=$rowk['msg'];
    $ud=$rowk['user'];
    $dat=$rowk['dat'];
    $dbab= mysqli_connect('localhost','root','',$ud)or die("could not connect database..");
    $sql="SELECT `dp` FROM `profile` WHERE id='1';";
    $resu=mysqli_query($dbab,$sql);
    if($resu)
    {
      $rowdic=mysqli_fetch_assoc($resu);
      $ima=$rowdic['dp'];
      $imagedic='images/'.$ima;
    }
  
$is++;

if($is%2==0)
{
    $output.='
  
    <div class="row" style="background:rgb(255,0,0,0.2); padding:5px;" >
    <div class="comli col-sm-12" ><p><img src="'.$imagedic.'"  height="30" width="30" style="border-radius: 50%;" id="display profile"/> <strong>'.$ud.'</strong>      <a>'.$comment.'</a>        <a style="float:right; font-style:italic;">'.$dat.'</a></p>
    
  </div>
    </div>
    
    
    ';
}
else
{

    $output.='
  
    <div class="row" style="background:rgb(255,0,0,0.08); padding:5px;" >
    <div class="comli col-sm-12" ><p><img src="'.$imagedic.'"  height="30" width="30" style="border-radius: 50%;" id="display profile"/> <strong>'.$ud.'</strong>       <a>'.$comment.'</a>       <a style="float:right; font-style:italic;">'.$dat.'</a></p>
    
  </div>
    </div>
    
    
    ';

} 
  


}


}

else{


    $output.='
  
    <div class="row" style="background:rgb(255,0,0,0.08);>
    <div class="comli col-sm-12"><a>No comments yet</a></div></div>';



}









$output.='</div>
</div>';










$output.='<div>
';


echo $output;


?>