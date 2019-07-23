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











?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="stylef.css">
<title>Home Page</title>
</head>

  <body>
 
  <form  method="post"  enctype="multipart/form-data" >
      <div class="formx">
<div class="row">
  <div class="col-sm-4">

  <div class="dfc">
  <input type="text" placeholder="Search groups..." name="search_text" id='search_text'>
  <button class="btn btn-primary" onclick="getProfile();" type="button" id='search1'><i class="fa fa-search w3-large"></i></button>
</div>
  
</div>
<div class="col-sm-8">
        <nav>
             <ul>

               <li ><a href="index.php"><i class="fa fa-home w3-xxlarge"></i></a></li>
               <li class="active" ><a href="grouphome.php"><i class="fa fa-users w3-xxlarge"></i></a></li>
               
               <li ><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
               <li><a href="addgrou.php" title="add group"><i class="fa fa-plus-circle w3-xxlarge"></i></a></li>
               
               <li><a href="groupmessage.php"><i class="fa fa-comments w3-xxlarge"></i></a></li>
               <?php 
                  $usernamed=$_SESSION['username'];
                  $db= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
                  $sql="SELECT COUNT(user) FROM `notification` WHERE stat='unread' ;";
                  $result=mysqli_query($db,$sql);        
                  if($result)
                  {
                      $row=mysqli_fetch_assoc($result);
                      $i=$row['COUNT(user)'];
                      if($i==0){
                          $i='';
                      }



                  }
                  else
                  {
                      $i='';
                  }

               ?>
               <li> <a href="notification.php"><i class="fa fa-bell w3-xxlarge"></i><span class="badge bage-light" style="color:black;" ><?php echo $i; ?></span></a> </li>
            </ul>

        </nav>


</div>
</div> </div>

<div class="row">
<div class="col-sm-6">
<div class="formc" id="formc">
 
 <div>
<p><strong>Start a POLL USING TELEX</strong></p>
                </div>


 <div onload="myFunction('mySelect','mySelect2','ass0' );" class="baa" id="bass">
       
       <input type="text" placeholder="Untitled question" name="qn0" required>
       <input type="text" placeholder="Question description" name="gdescrp" required>
     
<div id="ass0" class="ass">
<div>
<input type="radio" name="multi"><input placeholder="options" name="ass00" required>
</div> </div>
<div>
   <button class="btn btn-warning" type="button" onclick="radio('ass0')">+</button>
</div>    

</div>
               

  
</div>
</div>

<div class="col-sm-6">
<div class="formco" id="formco">

<button class="btn btn-warning" type="submit" name="submit">POST</button>
<br>

<script>

var i=0;
  var j=0;




      function radio(ass09)
     {
        j++;
      var an0=ass09+j;
        var dy= document.getElementById(ass09);
        console.log(ass09);
       var dy2=document.createElement("input");
       var dy1=document.createElement("input");
             dy1.placeholder="options";
             dy1.setAttribute("name",an0);
             dy2.setAttribute("type", "radio");
             dy2.setAttribute("name","multi");
             dy.appendChild(dy2);
              dy.appendChild(dy1);
     

     }





     </script>

<?php

$usernamed=$_SESSION['username'];
$groupname=$_SESSION['groupname'];
$db= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
$sql = "CREATE TABLE `post`(
    id  INT(6) UNSIGNED AUTO_INCREMENT ,
    dat VARCHAR(255), 
    groups VARCHAR(255),
    users VARCHAR(255) ,
    qn1 VARCHAR(255) ,
    qndesc VARCHAR(255) ,
    answers VARCHAR(255) ,
    voting VARCHAR(255) ,
    post VARCHAR(255),
    caption VARCHAR(255),
    lik VARCHAR(255),
    comment VARCHAR(255),
    cole1 VARCHAR(255),
    cole2 VARCHAR(255),
    cole3 VARCHAR(255),
    kind VARCHAR(255),
    PRIMARY KEY(id)
     )";
mysqli_query($db, $sql);








$db= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
$sql="SELECT * FROM `connect`";
$result=mysqli_query($db,$sql);
if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $namepul=$row['users'];
        $daab= mysqli_connect('localhost','root','', $namepul)or die("could not connect database.."); 
        $sql = "CREATE TABLE `grouppost`(
            id  INT(6) UNSIGNED AUTO_INCREMENT ,
            dat VARCHAR(255), 
            groups VARCHAR(255),
            users VARCHAR(255) ,
            qn1 VARCHAR(255) ,
            qndesc VARCHAR(255) ,
            answers VARCHAR(255) ,
            voting VARCHAR(255) ,
            post VARCHAR(255),
            caption VARCHAR(255),
            lik VARCHAR(255),
            comment VARCHAR(255),
            cole1 VARCHAR(255),
            cole2 VARCHAR(255),
            cole3 VARCHAR(255),
            kind VARCHAR(255),
            PRIMARY KEY(id)
             )";

        mysqli_query($daab, $sql);
    }
}























 if(isset($_POST['submit']))
 {
  
    $usernamed=$_SESSION['username'];
    $groupname=$_SESSION['groupname'];
$db= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 



$i=0;

$qn1=mysqli_real_escape_string($db, ($_POST['qn0']));
$des=mysqli_real_escape_string($db, ($_POST['gdescrp']));
$db= mysqli_connect('localhost','root','', $groupname)or die("could not connect database..");  
$sql = "CREATE TABLE `$qn1`(
    id  INT(6) UNSIGNED AUTO_INCREMENT,
    users VARCHAR(255),
    PRIMARY KEY(id)
     )";

mysqli_query($db, $sql);






for($j=0; $j<40; $j++)
{

    $rand = array('0', '1','2','3','4' ,'5', '6', '7', '8', '9', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,12)].$rand[rand(0,12)].$rand[rand(0,12)].$rand[rand(0,12)].$rand[rand(0,12)].$rand[rand(0,12)];
     $an0='ass'.$i.$j;
    if(isset($_POST[$an0])){
        date_default_timezone_set("Asia/Kolkata");
        $dt=date("Y-m-d H:i:s");
      $an =mysqli_real_escape_string($db, ($_POST[$an0]));
      $db= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
      $sql="INSERT INTO `post` (`dat`,`groups`,`users`,`qn1`,`qndesc`,`answers`,`voting`,`kind`,`cole1`) VALUES ('$dt','$groupname','$usernamed','$qn1','$des','$an','0','2','$color');";
      mysqli_query($db, $sql);

      $db= mysqli_connect('localhost','root','', $groupname)or die("could not connect database..");  
      $sql="ALTER TABLE `$qn1`
      ADD $an VARCHAR(255);";
      mysqli_query($db, $sql);




      
$db= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
$sql="SELECT * FROM `connect`";
$result=mysqli_query($db,$sql);
if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $namepul=$row['users'];
        $daab= mysqli_connect('localhost','root','', $namepul)or die("could not connect database.."); 
        $sql="INSERT INTO `grouppost` (`dat`,`groups`,`users`,`qn1`,`qndesc`,`answers`,`voting`,`kind`,`cole1`) VALUES ('$dt','$groupname','$usernamed','$qn1','$des','$an','0','2','$color');";
         mysqli_query($daab, $sql);
    }
}




 }




}

 }


?>

</div>
</div>
</div>


</form>

</body>
	  
	   </html>