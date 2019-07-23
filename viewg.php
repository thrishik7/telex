<?php
session_start();
if(!isset($_SESSION['username']))
{

    $_SESSION['msg']="You must log in first to view this page";
    header("location : login1.php");
}

if(isset($_GET['logout']))
{
      
   
    unset($_SESSION['username']);
    session_destroy();
    header("location: login1.php");
}

?>


<?php 



$groupname=$_SESSION['viewg'];

$_SESSION['groupname']=$_SESSION['viewg'];

$df='btn'.$groupname;
if(isset($_POST[$df]))
{
    $groupname=$_SESSION['viewg'];
   
    $usernamed1=$_SESSION['username'];
    $usernamed=$_SESSION['admin'];
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y-m-d H:i:s");
    
    $db= mysqli_connect('localhost','root','',$groupname)or die("could not connect database..");
    $sql = "INSERT INTO `connect`(`users`,`stat`) VALUES ('$usernamed1','request');";
      mysqli_query($db, $sql);
    
      
      $dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
    
    $sql = "INSERT INTO `notification`(`dat`,`msg`,`user`,`kind`,`stat`) VALUES ('$dt','$groupname','$usernamed1','5','unread');";
    mysqli_query($dba, $sql);



}



?>
<!--?php
 ini_set(display_errors',1);
 ?-->
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
<title>Home Page</title>
</head>
  <body>
 
  <form  method="post"  action="viewg.php" enctype="multipart/form-data">
      <div class="formx">
<div class="row">
  <div class="col-sm-6">
  <?php if(isset($_SESSION['username'])) : ?>
  
  <?php
$usernamed= $_SESSION['username'];
  $dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
     $sql="SELECT `dp` FROM `profile` WHERE id='1';";
     $resu=mysqli_query($dba,$sql);
     if($resu)
     {
       $rowq=mysqli_fetch_assoc($resu);
       $ima=$rowq['dp'];
       $image='images/'.$ima;
     }


?>











<h1> <a href="profile.php" style="border-radius: 50%; border:none; background:none;" ><img src="<?php echo $image;?>"   height="80" width="80" style="border-radius: 50%; border:none; background:none;" id="display profile"/></a> Welcome <strong><?php echo $_SESSION['username']; ?></strong> <a href="index.php?logout='1'"><i class="fa fa-sign-out w3-xxlarge"></i></a></h1>
  
	  <?php endif ?>
</div>
<div class="col-sm-6">
        <nav>
             <ul>

    
             <li ><a href="index.php"><i class="fa fa-home w3-xxlarge"></i></a></li>
               <li  ><a href="grouphome.php"><i class="fa fa-users w3-xxlarge"></i></a></li>
               
               <li class="active" ><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
               <li ><a href="addgrou.php" title="add group"><i class="fa fa-plus-circle w3-xxlarge"></i></a></li>
               
               <li><a href="groupmessage.php"><i class="fa fa-comments w3-xxlarge"></i></a></li>
             </ul>

        </nav>

</div></div>

<div class="row">

<div class="col-sm-1" style="background:none;text-align: center; ">
<button style="border:none; background:none;">
<i class="fas fa-ellipsis-v" style="color:rgb(23, 152, 192); font-size:30px; margin-top:40px;" aria-hidden="true"></i>
</button>
</div>


<div class="col-sm-4">
<div class ="formb">
<?php 
$usernamed=$_SESSION['username'];
$groupname=$_SESSION['viewg'];
$db= mysqli_connect('localhost','root','', 'telexgroup')or die("could not connect database.."); 
$sql="SELECT * FROM `grouptel` WHERE groupname='$groupname';";
$result=mysqli_query($db, $sql); 

       if($result)
       {
         $row=mysqli_fetch_assoc($result);
       $nameg=$row['groupname'];
       $dp =$row['cole1'];
       $bio=$row['groupdescription'];
       $img='images/'.$dp;
      $admin=$row['admint'];
      


      $as='btn'.$nameg;

?>
<img src="<?php echo $img?>"  height="230" width="230" id="display profile"/>
<div>
<label for="profileImage"><?php echo $nameg ; ?>-<?php echo $admin ; ?></label>

</div> <div>
       <p><?php echo $bio ?></p>
      
    </div>
    <?php } 
        else 
           { ?> 


<img src="ava1.png"  height="230" width="230" id="display profile"/>
<div>
<label for="profileImage"><?php echo $nameg ; ?>-<?php echo $admin ; ?></label>


</div> 


    <?php } ?>



</div>

</div>


<div class="col-sm-4">
<div class ="formb1">

<div class="row">
<div class="col-sm-6">


<?php
$usernamed=$_SESSION['viewg'];
$db= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database.."); 
$sql="SELECT COUNT(DISTINCT qn1) FROM `post` WHERE kind='2';";
$result=mysqli_query($db,$sql);
if($result)
{
    $row=mysqli_fetch_assoc($result);
    $nop1=$row['COUNT(DISTINCT qn1)'];
}
else
{
    $nop1=0;
}

$usernamed=$_SESSION['viewg'];
$db= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database.."); 
$sql="SELECT COUNT(DISTINCT post) FROM `post` WHERE kind='3';";
$result=mysqli_query($db,$sql);
if($result)
{
    $row=mysqli_fetch_assoc($result);
    $nop2=$row['COUNT(DISTINCT post)'];
}
else
{
    $nop2=0;
}

$nop=$nop1+$nop2;



?>

<label ><strong><?php echo $nop;?></strong></label>











<div>
<label >POSTS</label>
</div>
</div>
<div class="col-sm-6">






<?php
$usernamed=$_SESSION['viewg'];
$db= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database.."); 
$sql="SELECT COUNT(DISTINCT users) FROM `connect` WHERE `stat`='connected' OR `stat`='admin';";
$result=mysqli_query($db,$sql);
if($result)
{
    $row=mysqli_fetch_assoc($result);
    $noc=$row['COUNT(DISTINCT users)'];
}
else
{
    $noc=0;
}

?>

<label ><strong><?php echo $noc;?></strong></label>
<div>
<label>MEMBERS</label>
</div>

</div> 
</div></div>

<?php
$usernamed1=$_SESSION['username'];
$usernamed=$_SESSION['viewg'];


    $as='btn'.$usernamed;
?>
<div class="row">

<div class="col-sm-6">

<?php

$usernamed1=$_SESSION['username'];
$usernamed=$_SESSION['viewg'];
$dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql = "SELECT * FROM `connect` WHERE `users`='$usernamed1';";
$result=mysqli_query($dba, $sql);
 if($result)
 {
     $row=mysqli_fetch_assoc($result);
     $cond=$row['stat'];
 
 

?>

<?php if($cond=="request"){
    ?>
<button type="submit" class="btn btn-warning btn-block" disabled>Request send</button>

<?php }
   else if($cond=="connected")
       { ?>

<button type="submit" class="btn btn-warning btn-block" disabled>JOINED</button>
<?php  }
  
  else if($cond=="admin")
   { ?>

<button type="submit" class="btn btn-success btn-block" disabled>ADMIN</button>
<?php  }



else  { ?>
    <button type="submit" name="<?php echo $as ?>" class="btn btn-warning btn-block">JOIN</button>

<?php }




}
       else  { ?>
    <button type="submit" name="<?php echo $as ?>" class="btn btn-warning btn-block">JOIN</button>

<?php }?>
</div>
</div>

</div>
           </div>




           </div>
           </div>

























</div>

</div>








</div>


<div id="jingle">

<div class ="row">













<div class="col-sm-12">
<div style="height:430px; margin:10px;  background:rgb(255, 255, 255, 0.5); box-shadow: 0 15px 25px rgba(0,0,0,.5); overflow-y: scroll;  padding :26px;" class="chat_history">
<div class="row">
<div class="col-sm-12" style=" margin-bottom:10px;">







<div class="row">
   <div class="col-sm-12">
<?php 

$usernamed1=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
?>

<?php 
$groupnamess=$_SESSION['groupname'];
  $db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
  $sql="SELECT * FROM `grouppost` WHERE kind='3' AND groups='$groupnamess' ORDER BY dat DESC;  ";
  $results=mysqli_query($db,$sql);
  if($results)
  {
     while($rows=mysqli_fetch_assoc($results))
  {
    
     $groupname=$rows['groups'];
     $kind=$rows['kind'];
     $dbaab= mysqli_connect('localhost','root','','telexgroup')or die("could not connect database..");
     $sql="SELECT * FROM `grouptel` WHERE `groupname`='$groupname';";
     $resd=mysqli_query($dbaab,$sql);
     if($resd)
     {
        $rowq=mysqli_fetch_assoc($resd);
        $ima2=$rowq['cole1'];
        $image2='images/'.$ima2;
 
     }
     $im=$rows['post'];
     $capt=$rows['caption'];
     $dt=$rows['dat'];
     $user=$rows['users'];
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


$isn=$user;
if($kind==3)
{

?>
<div class="timeline" style="width:480px;">
 <div class="row">


    
     
   
     <div class="col-sm-12">
     <div class="mamai">
    
         <p> <button  style="background:none; border:none;"  name="<?php echo $isn; ?>"  type="submit" ><img src="<?php echo $image2;?>"  height="50" width="50" style="border-radius: 50%;" id="display profile"/>
      </button> <?php echo $dt; ?> <strong><?php echo $user; ?></strong></p>
     </div>
  </div> 
    </div>



    <?php    $popt='opt'.$rows['id'];   ?>
<div class="row">
<div class="col-sm-12 form-group">
<div class="mamay">

    <div id="<?php echo $popt ?>"></div>
</div>
</div> </div>



    <div class="row">
<div class="col-sm-12">
<div class="mamay">

    <p> <strong><?php echo $capt; ?></strong></p>
</div>
</div> 
</div>
  

<?php if($im!='') {?>
<div class="row">
<div class="col-sm-12 text-center">
<div class="mamay">

    <p> <img src="<?php echo $post ?>"  height="280" width="455" /></p>
</div>
</div> </div>



    <?php }?>


</div>

<?php
   }
}} 
$groupnamess=$_SESSION['groupname'];

$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
$sql="SELECT DISTINCT qn1, groups, qndesc, users FROM `grouppost` WHERE kind='2' AND groups='$groupnamess' ORDER BY dat DESC;  ";
$results=mysqli_query($db,$sql);
if($results)
{
   while($rows=mysqli_fetch_assoc($results))
{
$user=$rows['users'];
$groupname=$rows['groups'];
$qn1=$rows['qn1'];
$qnd=$rows['qndesc'];
$dbaab= mysqli_connect('localhost','root','','telexgroup')or die("could not connect database..");
$sql="SELECT * FROM `grouptel` WHERE `groupname`='$groupname';";
$resd=mysqli_query($dbaab,$sql);
if($resd)
{
   $rowq=mysqli_fetch_assoc($resd);
   $ima2=$rowq['cole1'];
   $image2='images/'.$ima2;

}


?>
<div class="timeline" style="width:480px;">
 
     
   <div class="row">
<div class="col-sm-12">
     <div class="mamai">
    
         <p> <button  style="background:none; border:none;"  name="<?php echo $isn; ?>"  type="submit" ><img src="<?php echo $image2;?>"  height="50" width="50" style="border-radius: 50%;" id="display profile"/>
      </button><strong><?php echo $user; ?></strong></p>
     </div>
  </div> 
    </div>



<div class="row">
    <div class="col-sm-12">
     <div class="mamai">
    
         <p><strong><?php echo $qn1; ?></strong></p>
     </div>
  </div> 
    </div>
<div class="row">
    <div class="col-sm-12">
     <div class="mamai">
    
         <p>Description: <?php echo $qnd; ?></p>
     </div>
  </div> 
    </div>
    <div id="resultp">

<?php                

$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");


$sql="SELECT SUM(voting) FROM `grouppost` WHERE qn1='$qn1' ";
$resultSs=mysqli_query($db,$sql);

if($resultSs){
   $rowv=mysqli_fetch_assoc($resultSs);
   $votes=$rowv['SUM(voting)'];
}

$sql="SELECT * FROM `grouppost` WHERE qn1='$qn1' ";
$resultsv=mysqli_query($db,$sql);
if($resultsv)
{
    $j=0;
   while($rowff=mysqli_fetch_assoc($resultsv))
{

    $an=$rowff['answers'];
    $color=$rowff['cole1'];
    $vote=$rowff['voting'];
    if($votes==0)
    {
        $vts=0;
    }
    else
    $vts= ($vote/$votes)*100;
  $j++;
?>


<div class="row">
    <div class="col-sm-6" style="text-algin:center;">
     <div  style="text-algin:center;">
    
         <p><input type="radio" id="<?php echo $j; ?>" name="<?php echo $qn1; ?>" value="<?php echo $an; ?>" Required><strong> <?php echo $an; ?></strong></p>
     </div>
  </div> 
  <div class="col-sm-6" style="text-algin:center;">
     <div  style="text-algin:center;">
    
         <p><input style="width:<?php echo $vts.'%'; ?>; background:<?php echo  $color;  ?>; border:none;" ></p>
     </div>
  </div> 
    </div>

   



<?php } } ?></div>

<div class="row">
    <div class="col-sm-12">
     <div class="mamai">
    <?php
    $usernamed=$_SESSION['username'];
$dab= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
$sql="SELECT DISTINCT users FROM `$qn1` WHERE `users`='$usernamed';";
$resultss=mysqli_query($dab,$sql);
?>






     </div>
  </div> 
    </div>



    </div>








<?php 
}} 
?>





</div></div>

















</div>
</div>
</div>




</div>












</div>
</div>





           


<script>
function viewpost(post)
{


  $.ajax({
              url:"viewpost.php",
              method:"post",
              data:{post:post
                },
              dataType:"text",

                success:function(data)
              {
                  $('#jingle').html(data);
              }
       });
  }


  function delpp(id)
{
  console.log(id);
   $.ajax({
   
            url:"del.php",
            method:"post",
            data:{
                 id:id
                },
          

    

 });



}


function cutma()
{

 var yo=document.getElementById('jingle');
 yo.innerHTML="";


}









</script>








</form>


</body>
	  
	   </html>