<?php 
session_start();
$usernamed=$_SESSION['username'];





$output='
<div style="height:140px; width:200%;   margin:0px; background:rgb(255, 255, 255); margin-bottom:5px; padding:23px;">

<div class="row">

<div class="comli col-sm-12" >

<p>
<button title="close"  type="button" onclick="cutma7();" style="background:none;margin-left:-150px;  border:none;" ><strong><i class="far fa-times-circle w3-large"></i></strong></button>
</p>
  </div></div>  




<div id="privcool">';


$db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql="SELECT * FROM `profile` WHERE id='1'";
$result=mysqli_query($db,$sql);
if($result)
{
$roww=mysqli_fetch_assoc($result);
$key=$roww['post'];


if($key=="private")
{
    $output.='
    <div class="row" style="float:left;"><button  type="button" onclick="aprivatee()" style="color:blue; background:none; border:none; margin:22px; " ><i class="fa fa-lock" style="font-size:12px"></i><b>  PRIVATE &#10003</b></button></div>
    </div>
    
    <div class="row" style="float:left;"><button href="profile.php" style="color:black; background:none; border:none; margin:22px;"><i class="fa fa-trash" style="font-size:12px"></i><b> DELETE_ACCOUNT</b></button></div>
    
    </div>
    ';
}
else if($key!="private"){
$output.='
<div class="row" style="float:left;"><button  type="button" onclick="privatee()" style="color:black; background:none; border:none; margin:22px; " ><i class="fa fa-lock" style="font-size:12px"></i><b>  PRIVATE</b></button></div>
</div>

<div class="row" style="float:left;"><button href="profile.php" style="color:black; background:none; border:none; margin:22px;"><i class="fa fa-trash" style="font-size:12px"></i><b> DELETE_ACCOUNT</b></button></div>

</div>
';
}



}

echo $output;


?>