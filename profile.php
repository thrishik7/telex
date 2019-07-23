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
 
  <form  method="post"   enctype="multipart/form-data">
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
               <li><a href="search.php"><i class="fa fa-search w3-xxlarge"></i></a></li>
               
               <li class="active"><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
               <li><a href="add.php"><i class="fa fa-plus-square-o w3-xxlarge"></i></a></li>
               
               <li><a href="message.php"><i class="fa fa-send w3-xxlarge"></i></a></li>
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

</div></div>

<div class="row">

<div class="col-sm-1" style="background:none;text-align: center; ">
<button type="button" onclick="settin();" style="border:none; background:none;">
<i class="fas fa-ellipsis-v" style="color:rgb(23, 152, 192); font-size:30px; margin-top:40px;" aria-hidden="true"></i>
</button>

<div id="reslu">

</div>
<script>
function settin()
{
 
 $.ajax({
                url:"settin.php",
                method:"post",
                
               

                success:function(data)
                {
                  $('#reslu').html(data);
                }

 });


}



function privatee()
{
  

  $.ajax({
          url:"privatee.php",
          method:"post",
          dataType:"text",
          success:function(data)
              {
                 console.log("done");
              }

  });
  

}






</script>




</div>


<div class="col-sm-4">
<div class ="formb">
<?php 
$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database.."); 
$sql="SELECT * FROM `profile`";
$result=mysqli_query($db, $sql); 

       if($result)
       {
         $row=mysqli_fetch_assoc($result);

       $dp =$row['dp'];
       $bio=$row['bio'];
       $img='images/'.$dp;
       





?>
<img src="<?php echo $img?>"  height="230" width="230" id="display profile"/>
<div>
<label for="profileImage"><?php echo $_SESSION['username']; ?></label>
<a href="editprofile.php"><i class="fa fa-edit w3-large"></i></a>
</div> <div>
       <p><?php echo $bio ?></p>
      
    </div>
    <?php } 
        else 
           { ?> 


<img src="ava1.png"  height="230" width="230" id="display profile"/>
<div>
<label for="profileImage"><?php echo $_SESSION['username']; ?></label>
<a href="editprofile.php"><i class="fa fa-edit w3-large"></i></a>
</div> <div>
       <p>Add bio</p>
      
    </div>


    <?php } ?>



</div>

</div>


<div class="col-sm-3">
<div class ="formb1">

<div class="row">
<div class="col-sm-6">


<?php
$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','', 'telex')or die("could not connect database.."); 
$sql="SELECT COUNT(post) FROM `post` WHERE user='$usernamed' ;";
$result=mysqli_query($db,$sql);
if($result)
{
    $row=mysqli_fetch_assoc($result);
    $nop=$row['COUNT(post)'];
}
else
{
    $nop=0;
}

?>

<label ><strong><?php echo $nop;?></strong></label>











<div>
<label >POSTS</label>
</div>
</div>
<div class="col-sm-6">






<?php
$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database.."); 
$sql="SELECT COUNT(DISTINCT user) FROM `connect` WHERE `stat`='connected';";
$result=mysqli_query($db,$sql);
if($result)
{
    $row=mysqli_fetch_assoc($result);
    $noc=$row['COUNT(DISTINCT user)'];
}
else
{
    $noc=0;
}

?>

<label ><strong><?php echo $noc;?></strong></label>
<div>
<label>CONNECTED</label>
</div>

</div> 
</div></div></div>
<div class="col-sm-3" style="background:none;text-align: center; ">
<div class="row"  style="background:none;text-align:center;">
<div class="col-sm-6" style="background:none; margin-top:110px;">
<a href="grouphome.php"  style="border:none; background:none;">
<i class="fa fa-users" style="color:rgb(249, 197, 28); font-size:60px; " aria-hidden="true"></i>
</a>
</div>

<div class="col-sm-6" style="background:none;margin-top:40px;text-align:center;">
<div style="height:150px;  margin:20px; background:rgb(255, 255, 255);overflow-y: scroll; padding:30px; margin-bottom:24px;">


<?php 
$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','', 'telexgroup')or die("could not connect database.."); 
$sql="SELECT * FROM `grouptel` ;";
$result=mysqli_query($db,$sql);
if($result)
{
     while($rowg=mysqli_fetch_assoc($result))
{
    $groupname=$rowg['groupname'];
    $dp =$rowg['cole1'];
    $bio=$rowg['groupdescription'];
    $img='images/'.$dp;
     $admin=$rowg['admint'];
   
     $dbS= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
    $sql="SELECT * FROM `connect` WHERE users='$usernamed' ";
    
    $resulst=mysqli_query($dbS,$sql);
  if($resulst){
    $roww=mysqli_fetch_assoc($resulst);
    $uus=$roww['users'];
    if($uus==$usernamed)
{


   ?>
   

<div class="row" style="background:none;text-align:center; padding:10px;" >

<p> <button  style="background:none; border:none;"  name="<?php echo $groupname; ?>"  type="submit" >
<img src="<?php echo $img;?>" height="60" width="60" style="border-radius: 50%; margin-top:10px;" id="display profile"/></button> 

<?php

if(isset($_POST[$groupname]))
{
 
$_SESSION['groupname']=$groupname;

?>

<script><?php echo ("location.href='groupprofile.php';");?></script>



<?php
}






?>







</div>
<?php }} }}?>
</div>
</div></div>
</div>
</div>







</div>


<div id="jingle">

</div>





           

<div class="row">

<?php 

$usernamed=$_SESSION['username'];
$db= mysqli_connect('localhost','root','', 'telex')or die("could not connect database.."); 
$sql="SELECT * FROM `post` WHERE user='$usernamed'";
$result=mysqli_query($db, $sql); 

     while($row=mysqli_fetch_assoc($result))
{
     $post=$row['post'];
     $img='post/'.$post;
     if($post!=""){
    ?>

<div class= 'col-sm-2'>
<div class="baa">
<img src="<?php echo $img ?>" type="submit" onclick="viewpost('<?php echo $post ?>')"  height="180" width="230" />
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



</div>



<?php } }?>

           </div>
</form>


</body>
	  
	   </html>