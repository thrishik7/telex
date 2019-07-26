<?php
session_start();
$idd=$_POST['id'];
$userd=$_POST['user'];
?>


<?php



$db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");
$output="";
$USER=$_SESSION['username'];
$sql="SELECT * FROM user2 WHERE  username=' ' ";

$dab= mysqli_connect('localhost','root','',$USER)or die("could not connect database..");
$sl="SELECT DISTINCT user FROM `connect` WHERE stat='connected' ";
$resultu=mysqli_query($dab,$sl);
if($resultu)
{
  while($row=mysqli_fetch_array($resultu))
  {
    

    $sql.="OR username ='$userd'";
  }
  $sql.=";";


}


$result=mysqli_query($db,$sql);
if($result)
{
   
    while($row=mysqli_fetch_array($result))
    {
     

$usar=$row['username'];
         $emeil=$row['email'];
         $id=$row['id'];
         $dba= mysqli_connect('localhost','root','', $usar)or die("could not connect database.."); 
         $sql="SELECT * FROM `profile`";
         $results=mysqli_query($dba, $sql); 
         $rows=mysqli_fetch_array($results);
         $dp =$rows['dp'];
         $img='images/'.$dp;
         
         ?> <?php $idc='user_model_details'.$id;
         $idp='userpo'.$id;
         ?>
     
 
            <div id=<?php echo $idc ?> style="background:white; ">
         <div class="baaai">
           <button  type="button" style="background:none; border:none; display:block; " onclick="make_chat_dialog_box('<?php echo $id ?> ','<?php echo $usar ?>')" >
           <div class= "col-sm-12">
            <img src="<?php echo $img ?>"/><b><?php echo $usar ?></b>
         
           
           
           </div></button>  </div> 
        
          </div>
     
<?php 
$namew="send_chat".$id ;
$filename="filemm".$id;
if(isset($_POST[$namew]))
{

 
  date_default_timezone_set("Asia/Kolkata");
  $dt=date("Y-m-d H:i:s");

  $profileImageName=time().'_'.$_FILES['dp']['name'];

  $target='post/' . $profileImageName;
  move_uploaded_file($_FILES['dp']['tmp_name'],$target);
     $send=$_SESSION['username'];
     $user=$usar;

  $db= mysqli_connect('localhost','root','', 'telex')or die("could not connect database..");
  $sql="INSERT INTO messages (`dat`,`msg`,`sen`,`whom`,`cole1`,`cole2`,`stat`) VALUES ('$dt','$profileImageName','$send','$user','$id','3', 'unread') ;";
  mysqli_query($db, $sql);
 
 }
 
 




?>








<?php 

    }}


?>




















