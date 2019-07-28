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


$db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");
$sql="SELECT username FROM user2;";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {  while($row=mysqli_fetch_array($result))
     {
       $usar1=$row['username'];
       
     if(isset($_POST[$usar1]))
{


    $_SESSION['viewp']=$usar1;
    $bay=$_SESSION['viewp'];
    header("location: viewp.php?ID=$bay");

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

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
<title>Home Page</title>
</head>
<script>
    function triggerClick(){
document.querySelector("#eventImage").click();
    }

    </script>
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

</div></div></div>





<div id="result">



<div class='formak'>
   

   
   <h2 style="margin:30px;"><a>Create </a><a style="color:rgb(249, 197, 28);">TELEX </a><a></a>EVENT</h2>
    <div class="row"  style="margin:10px;" > 
       <div class="col-sm-4">
       <label for="groupname"><strong>Event photo:</strong></label></div>
       <div class="col-sm-8">
       <button type="button" style="border:none; background:none;" onclick="triggerClick()"><i class="fa fa-camera" aria-hidden="true"></i> Upload Photo</button></div>
       <input type="file" name="dp" id="eventImage" style="display:none;" >
    </div>
    <div class="row"  style="margin:10px;" > 
       <div class="col-sm-4">
       <label for="groupname"><strong>Event name:</strong></label></div>
       <div class="col-sm-8">
       <input type="text" name="eventname" placeholder="Add a short, clear name" required></div>
    </div>
    <div class="row"  style="margin:10px;" > 
       <div class="col-sm-4">
       <label for="groupname"><strong>Location:</strong></label></div>
       <div class="col-sm-8">
       <input type="text" name="location" placeholder="include a place or address" required></div>
    </div>
    <div class="row" style="margin:10px;"  > 
       <div class="col-sm-4">
       <label for="groupname"><strong>Description:</strong></label></div>
       <div class="col-sm-8">
       <textarea style="height:90px;" type="comment" name="description" placeholder="Tell people what your event is about" required></textarea></div>
    </div>
    <div class="row" style="margin:10px;" > 
       <div class="col-sm-4">
       <label for="groupname"><strong>Date/Time:</strong></label></div>
       <div class="col-sm-8">
       <input type="date" name="date" required><input style="margin-left:10px;" type="time" name="time" required>
       </div>
    
    </div>
  
    <div class="row" > 
    <div class="col-sm-12" style="margin:10px;">
       <button class="btn btn-primary" type="submit" style="margin-right:10px;"  name="event_create" >CREATE</button>
   </div>  
   
   
   
   </div>     
   

<?php 



$username= "";
 $email="";
 
 
 $errors = array();
 $servername = "localhost";
 $username = "root";
 $password = "";

 // Create connection
 $conn = mysqli_connect($servername, $username, $password);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }

 // Create database

 $groupname=$_SESSION['groupname'];
echo"this event will be posted in ".$groupname;

 $dbaa= mysqli_connect('localhost','root','', $groupname)or die("could not connect database..");
 
 $sql = "CREATE TABLE `event`(
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    users VARCHAR(255) ,
    eventname VARCHAR(255) ,
    eventphoto VARCHAR(255) ,
    locations VARCHAR(255) ,
    descriptions VARCHAR(255) ,
    datetimes VARCHAR(255),
    col1 VARCHAR(255),
    col2 VARCHAR(255),
    col3 VARCHAR(255),
    col4 VARCHAR(255),
    col5 VARCHAR(255),
    col6 VARCHAR(255),
    PRIMARY KEY(id)
 )";
 mysqli_query($dbaa, $sql) ;
 

if(isset($_POST['event_create']))
{
$eventname=mysqli_real_escape_string($db, ($_POST['eventname']));
$description=mysqli_real_escape_string($db, ($_POST['description']));
$location=mysqli_real_escape_string($db, ($_POST['location']));
$date=mysqli_real_escape_string($db, ($_POST['date']));
$time=mysqli_real_escape_string($db, ($_POST['time']));
$datetime=$date.$time;
$profileImageName=time().'_'.$_FILES['dp']['name'];
$target='images/' . $profileImageName;
move_uploaded_file($_FILES['dp']['tmp_name'],$target);




$usernamed=$_SESSION['username'];



$errors = array();
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE $groupname";
mysqli_query($conn, $sql);

$dbaa= mysqli_connect('localhost','root','', $groupname)or die("could not connect database..");

$sql = "CREATE TABLE `event`(
   id  INT(6) UNSIGNED AUTO_INCREMENT , 
   users VARCHAR(255) ,
   eventname VARCHAR(255) ,
   eventphoto VARCHAR(255) ,
   locations VARCHAR(255) ,
   descriptions VARCHAR(255) ,
   datetimes VARCHAR(255),
   col1 VARCHAR(255),
   col2 VARCHAR(255),
   col3 VARCHAR(255),
   col4 VARCHAR(255),
   col5 VARCHAR(255),
   col6 VARCHAR(255),
   PRIMARY KEY(id)

)";
mysqli_query($dbaa, $sql) ;


$sd="INSERT INTO `event` (`users`,`eventname`,`eventphoto`,`locations`,`descriptions`,`datetimes`) VALUES ('$usernamed','$eventname','$profileImageName','$location','$description','$datetime');";

mysqli_query($dbaa, $sd) ;

echo '<script> alert("event created"); </script>';








}









?>











</div>

</form>


</body>
	  
       </html>
       




















       
<script>
$(document).ready(function(){
    $('#search_text').keyup(function(){
       var txt= $(this).val();
       if(txt != '')
       {
        $('#result').html('');
          $.ajax({
              url:"fetch.php",
              method:"post",
              data:{search:txt},
              dataType:"text",
              success:function(data)
              {
                  $('#result').html(data);
              }
          });
       }
       else
       {
          $('#result').html('');
          $.ajax({
              url:"fetch.php",
              method:"post",
              data:{search:txt},
              dataType:"text",
              success:function(data)
              {
                  $('#result').html(data);
              }
          });
       }


    });
});




</script>