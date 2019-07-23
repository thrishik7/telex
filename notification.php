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
<!--?php
 ini_set(display_errors',1);
 ?-->
 
 
 
 
 <?php

$errors = array();

$servername = "localhost";
$username = "root";
$password = "";
$usernamed= $_SESSION['username'];
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $usernamed";
mysqli_query($conn, $sql);


$sql = "CREATE DATABASE telex";
mysqli_query($conn, $sql);

$usernamed1=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");

$sql="UPDATE `notification` SET `stat`='read';";
mysqli_query($db,$sql);

$usernamed1=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");

$sql = "CREATE TABLE `connect` (
     id  INT(6) UNSIGNED AUTO_INCREMENT , 
     dat VARCHAR(255) ,
     user VARCHAR(255),
     stat VARCHAR(255) ,
     PRIMARY KEY(id)
  )";
  mysqli_query($db, $sql);






?>
<?php
$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql="SELECT * FROM `notification` ORDER BY `dat` DESC;  ";
$result=mysqli_query($db,$sql);
if($result)
{

 while($row=mysqli_fetch_assoc($result))
 { 
   $is=$row['id'];
    $user=$row['user'];
    $msg=$row['msg'];
    $name='btb'.$user.$is;
    $naame='tbg'.$user.$is;


  
          if(isset($_POST[$name])){
          

            date_default_timezone_set("Asia/Kolkata");
            $dt=date("Y-m-d H:i:s");
            $usernamed=$_SESSION['username'];
            $db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
            $sql = "INSERT INTO `connect`(`dat`,`user`,`stat`) VALUES ('$dt','$user','connected');";
            mysqli_query($db, $sql);
            $sql="UPDATE `notification` SET `kind`='2' WHERE `user`='$user';"; 
            mysqli_query($db, $sql);
            $dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
            $sql = "UPDATE `connect`SET `stat`= 'connected' WHERE `user`='$usernamed';";
            mysqli_query($dba, $sql);
             
           
            $dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
            $mg=$usernamed1." has accepted your request";
            $sql = "INSERT INTO `notification`(`dat`,`msg`,`user`,`kind`,`stat`) VALUES ('$dt','$mg','$usernamed','2','unread');";
            mysqli_query($dba, $sql);

           
           

          }

         else if(isset($_POST[$naame])){
          

            date_default_timezone_set("Asia/Kolkata");
            $dt=date("Y-m-d H:i:s");
            $usernamed=$_SESSION['username'];
            $msg=$row['msg'];
            $dab= mysqli_connect('localhost','root','',$msg)or die("could not connect database..");
            $sql = "UPDATE `connect` SET `stat`= 'connected' WHERE `users`='$user';";
            mysqli_query($dab, $sql);
            $dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
            $sql="UPDATE `notification` SET `kind`='6' WHERE `user`='$user' AND `kind`='5';"; 
            mysqli_query($dba, $sql);
         
            $dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
            $mg=$usernamed1." has accepted your request to join the club ".$msg;
            $sql = "INSERT INTO `notification`(`dat`,`msg`,`user`,`kind`,`stat`) VALUES ('$dt','$mg','$usernamed','2','unread');";
            mysqli_query($dba, $sql);


           

          }












 }
}

?>






<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
<title>Home Page</title>
</head>
  <body>
  <form  method="post" action="notification.php" enctype="multipart/form-data" >
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

               <li><a href="index.php"><i class="fa fa-home w3-xxlarge"></i></a></li>
               <li><a href="search.php"><i class="fa fa-search w3-xxlarge"></i></a></li>
               
               <li><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
               <li><a href="add.php"><i class="fa fa-plus-square-o w3-xxlarge"></i></a></li>
               
               <li><a href="message.php"><i class="fa fa-send w3-xxlarge"></i></a></li>
               <li class="active"> <a href="notification.php"><i class="fa fa-bell w3-xxlarge"></i></a> </li>
            </ul>

        </nav>

</div>
</div>
</div>
<?php
$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql="SELECT * FROM `notification` ORDER BY `dat` DESC;  ";
$result=mysqli_query($db,$sql);
if($result)
{

 while($row=mysqli_fetch_assoc($result))
 {
   $is=$row['id'];
   $dt=$row['dat'];
   $msg=$row['msg'];
   $kind=$row['kind'];
   $user=$row['user'];
   $name='btb'.$user.$is;
   $dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
$sql="SELECT `dp` FROM `profile` WHERE id='1';";
$resu=mysqli_query($dba,$sql);
if($resu)
{
  $rowq=mysqli_fetch_assoc($resu);
  $ima=$rowq['dp'];
  $image='images/'.$ima;
}

if($user!=$usernamed1){
?>
<div class="not">
<div class="row">
  <div class="col-sm-8">
   <div class="row">
     <div class="col-sm-3">
     <img src="<?php echo $image;?>"  height="60" width="60" style="border-radius: 50%;" id="display profile"/>
 </div>
     <div class="col-sm-6">
     <div>
         <p><?php echo $dt; ?></p>
 </div>

 <?php
 if($kind==3)
 {
 $msg=$user." liked your post";
 ?>
    <p><strong><?php echo $msg; ?></strong></p>
 
 <?php } else if($kind==4){
   $msg=$user." has commented on your post";
   ?>
  <p><strong><?php echo $msg; ?></strong></p>
 

<?php } 
else if($kind==5 || $kind==6){
  $msg="You have a new request from ".$user." to join the group ".$msg;
  ?>
 <p><strong><?php echo $msg; ?></strong></p>


<?php }



else { ?>
 
  <p><strong><?php echo $msg; ?></strong></p>
 
 <?php } ?>
 
 
  
 

 
 </div>
 </div>
 </div>
   <?php
    if($kind==1) {
   ?>

 <div class="col-sm-4">
   <div class="ore">  
  <button class="btn btn-warning" type="submit" name="<?php echo $name;?>" >Accept</button>
    </div>
</div>
 <?php } ?>

 <?php
    if($kind==5) {
      $naame='tbg'.$user.$is;
   ?>

 <div class="col-sm-4">
   <div class="ore">  
  <button class="btn btn-warning" type="submit" name="<?php echo $naame;?>" >Accept</button>
    </div>
</div>
 <?php } ?>





 <?php
    if($kind==2 || $kind==6 ) {
   ?>

 <div class="col-sm-4">
   <div class="ore1">  
      <p style='font-size:20px;'><strong>&#9989</strong></p>
    </div>
</div>
 <?php } ?>

 <?php
    if($kind==3 || $kind==4) {
   
      $msgs=$row['msg'];
      $dAb= mysqli_connect('localhost','root','', 'telex')or die("could not connect database.."); 
      $sql="SELECT * FROM `post` WHERE id='$msgs'";
      $resulxt=mysqli_query($dAb,$sql);
     if($resulxt){
     $rowi=mysqli_fetch_assoc($resulxt);
     $imD=$rowi['post'];
     if($imD!=''){
     $imagD='post/'.$imD;

   ?>

 <div class="col-sm-4">
   <div class="ore1">  
      <img src="<?php echo $imagD;?>"  height="60" width="60"  />
    </div>
</div>
 <?php } } }?>

 
</div>
 </div>
<?php } } }?>

</form>


</body>
	  
	   </html>
	   