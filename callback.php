<?php
session_start();
  require "GoogleApi/vendor/autoload.php";
  $gClient= new Google_Client();
  $gClient->setClientId("153829526801-l2m0e3cumlouh585mq7696ome20ckoo5.apps.googleusercontent.com");
  $gClient->setClientSecret("yQp-yOn2VgKABwZB98-gx8gi");
  $gClient->setApplicationName("telex");
  $gClient->addScope("https://www.googleapis.com/auth/plus.login  https://www.googleapis.com/auth/userinfo.email");
  $gClient->setRedirectUri("https://localhost/project4/callback.php"); 

if(isset($_SESSION['access_token']))
  $getClient->setAccessToken($_SESSION['access_token']);
else if(isset($_GET['code'])){
    $token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    
    $_SESSION['access_token']=$token;
}
else
{
    header('Location: login1.php');
    exit();
}
$oAuth = new Google_Service_Oauth2($gClient);
$userData= $oAuth->userinfo_v2_me->get();



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
$sql = "CREATE DATABASE `projectusers`";
mysqli_query($conn, $sql);
$db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");

$sql = "CREATE TABLE user2(
   id  INT(6) UNSIGNED AUTO_INCREMENT , 
   username VARCHAR(255) ,
   fullname VARCHAR(255) ,
   email VARCHAR(255),
   password VARCHAR(255),

   PRIMARY KEY(id)

)";
mysqli_query($db, $sql) ;


$username=$userData["givenName"];
$username1= str_replace(' ', '_', $username);


$email=$userData["email"];
$fullname=$userData["name"];











$_SESSION['username']=$username1;

$usernamed=$_SESSION['username'];
$servername = "localhost";
$usernames = "root";
$passwords = "";
$usernamed= $_SESSION['username'];
// Create connection
$conn = mysqli_connect($servername, $usernames, $passwords);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "CREATE DATABASE $usernamed";
mysqli_query($conn, $sql);


$sql = "CREATE DATABASE telex";
mysqli_query($conn, $sql);

$usernamed= str_replace(' ', '_', $usernamed);


$dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
$sql = "CREATE TABLE `profile` (
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    dp VARCHAR(255) ,
    bio VARCHAR(255),
    post VARCHAR(255),
    connected VARCHAR(255),
    PRIMARY KEY(id)
  )";
  mysqli_query($dba, $sql);
  $_SESSION['username']=$username1;



  $db= mysqli_connect('localhost','root','', $username1)or die("could not connect database..");
$sql="SELECT * FROM `profile` WHERE id='1'";
$resultss=mysqli_query($db,$sql);
if($resultss)
{
    $row=mysqli_fetch_assoc($resultss);
    $chh=$row['id'];
    if($chh!=1)
  {
    $db= mysqli_connect('localhost','root','', $username1)or die("could not connect database..");
    $sql="INSERT INTO profile (`dp`,`bio`) VALUES ('ava1.png','Bio');";
    mysqli_query($db, $sql); 
  

  }



}






if(count($errors) == 0){
     $password= md5($password_1);
     $db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");
       $sql="SELECT * FROM `user2` WHERE username='$username1'";
       $resss=mysqli_query($db,$sql);

       if($resss)
       {
           $rr=mysqli_fetch_assoc($resss);
           $ccc=$rr['username'];
           if($ccc!=$username1)
           {

     $db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");
     $query="INSERT INTO user2 (username, fullname, email) VALUES ('$username1', '$fullname', '$email') ";
      mysqli_query($db, $query) ;
     
      
           }
       }

      


      
    $_SESSION['success']="You are now logged in";
     header('location: index.php');
   }






















?>
