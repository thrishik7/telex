<?php 
session_start();
$id=$_POST['id'];
$user=$_POST['user'];
$usernamed=$_SESSION['username'];

$del='dele'.$id;

$userpro='userpro'.$id;
$pro='pro'.$id;
$msg='msg'.$id;
$dis='dis'.$id;


$_SESSION['viewp']=$user;
$bay=$_SESSION['viewp'];

if($user==$usernamed)
{

?>
    <div style="height:100px;  margin:0px; background:rgb(255, 255, 255); margin-bottom:5px; padding :26px;">
    <div style="float:right;">
    <div class="row"><a href='' onclick="delpost('<?php echo $id ?>');"  id=<?php echo $del ?> style="color:rgb(23, 152, 192); background:none; border:none;" ><b>DELETE</b></a></div>
    <div class="row"><a href='profile.php' id=<?php echo $userpro ?> style="color:rgb(23, 152, 192); background:none; border:none;"><b>PROFILE</b></a></div>

    </div>
    </div>



<?php 
}
 
else
{     ?>

<div style="height:100px;  margin:0px; background:rgb(255, 255, 255); margin-bottom:5px; padding :26px;">
<div style="float:right;">
<div class="row"><a href="<?php  echo "viewp.php?ID=$bay" ;?>"  style="color:rgb(23, 152, 192);"><b>View profile</b></a></div>

<div class="row"><a href='' onclick="disconnectu('<?php echo $id ?>','<?php echo $user ?>');"  id=<?php echo $dis ?> style="color:rgb(23, 152, 192);"><b>Disconnect</b></a></div>

</div>


</div>




<?php }

























?>