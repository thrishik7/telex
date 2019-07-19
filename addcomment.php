<?php 
  session_start();
  $C=$_POST['Id'];
  $us=$_POST['user'];
  $p=$_POST['p'];

 
  $dab= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
  $sql="SELECT * FROM `post` WHERE id='$C';";
  $result=mysqli_query($dab,$sql);
  if($result)
  { 
    while($row=mysqli_fetch_assoc($result))
    {
        $like=$row['comment'];
        
        $like++;
        $sql="UPDATE `post` SET comment='$like' WHERE id='$C';";
        mysqli_query($dab,$sql);



    }
}

    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y-m-d H:i:s");
    $usernamed1=$_SESSION['username'];
      $usernamed=$us;
       $dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
       $mg=$C;
      $sql = "INSERT INTO `notification`(`dat`,`msg`,`user`,`kind`,`stat`) VALUES ('$dt','$mg','$usernamed1','4','unread');";
      mysqli_query($dba, $sql);


 
  



  
 
  ?>