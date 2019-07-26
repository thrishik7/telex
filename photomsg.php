
<?php 

session_start();

$send=$_SESSION['username'];
$id=$_SESSION['idim'];
$filename="filemm".$id;
  date_default_timezone_set("Asia/Kolkata");
  $dt=date("Y-m-d H:i:s");
echo $_FILES[$filename];

if(isset($_FILES["filemm"]))
{
      $file=$_FILES["filemm"];
  $profileImageName=time().'_'.$file["name"];
  $target='post/' . $profileImageName;
  move_uploaded_file($file['tmp_name'],$target);
     $usernamed=$_SESSION['username'];
     $user=$_SESSION['userm'];
$id=$_SESSION['idim'];
  $db= mysqli_connect('localhost','root','', 'telex')or die("could not connect database..");
  $sql="INSERT INTO messages (`dat`,`msg`,`sen`,`whom`,`cole1`,`cole2`,`stat`) VALUES ('$dt','$profileImageName','$send','$user','$id','3', 'unread') ;";
  mysqli_query($db, $sql);
 
}

 









?>

