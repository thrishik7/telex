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
$sql = "CREATE TABLE `notification` (
     id  INT(6) UNSIGNED AUTO_INCREMENT , 
     dat VARCHAR(255) ,
     msg VARCHAR(255),
     user VARCHAR(255),
     kind VARCHAR(255),
     stat VARCHAR(255) ,
     PRIMARY KEY(id)
  )";
  mysqli_query($db, $sql);
  $sql = "CREATE TABLE `comment` (
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    dat VARCHAR(255) ,
    msg VARCHAR(255),
    user VARCHAR(255),
    post VARCHAR(255),
    cole1 VARCHAR(255),
    cole2 VARCHAR(255),
    stat VARCHAR(255) ,
    PRIMARY KEY(id)
 )";
 mysqli_query($db, $sql);

    $sql = "CREATE TABLE `connect` (
         id  INT(6) UNSIGNED AUTO_INCREMENT , 
         dat VARCHAR(255) ,
         user VARCHAR(255),
         stat VARCHAR(255) ,
         PRIMARY KEY(id)
      )";
      mysqli_query($db, $sql);
    


 $dab= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
 $sql = "CREATE TABLE `messages` (
  id  INT(6) UNSIGNED AUTO_INCREMENT , 
  dat VARCHAR(255) ,
  msg VARCHAR(255),
  sen VARCHAR(255),
  whom   VARCHAR(255),
  cole1 VARCHAR(255),
  cole2 VARCHAR(255),
  stat VARCHAR(255) ,
  PRIMARY KEY(id)
)";




mysqli_query($dab, $sql);
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
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
<script>
function like(post,user)
{
 
  $.ajax({
  
    url:"like.php",
    method:"post",
    data:{Id:post,
          user:user
    
    },
 dataType:"text",
  success:function(data){
    $('#resul').html(data);
  }
  
  })
}
function liker(post,user)
{
 
  $.ajax({
  
    url:"liker.php",
    method:"post",
    data:{Id:post,
          user:user
    
    },
    dataType:"text",
  success:function(data){
    $('#resul').html(data);
  }
  
    
  })
}
</script>



<title>Home Page</title>
</head>
  <body>
 <form method="post" action="index.php" enctype="multipart/form-data" >
  <div class="formx" method="post">
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

               <li class="active"><a><i class="fa fa-home w3-xxlarge"></i></a></li>
               <li><a href="search.php"><i class="fa fa-search w3-xxlarge"></i></a></li>
               
               <li><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
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
               <li> <a href="notification.php"><i class="fa fa-bell w3-xxlarge"></i><span class="badge bage-light" style="color:black;" ><?php echo $i; ?></span></a> </li>          </ul>

        </nav>

</div>
</div></div>
<div class="row">
  <div class="col-sm-6">
<div class="timeline1">

<?php 
if(isset($_POST['timeline']))
{
  date_default_timezone_set("Asia/Kolkata");
  $dt=date("Y-m-d H:i:s");
$timeline=$_POST['timelinep'];
$li=0;
$comm=0;
$user=$_SESSION['username'];
  $dab= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="INSERT INTO `post` (`dat`,`user`,`caption`,`lik`,`comment`) VALUES ('$dt','$user','$timeline','$li','$comm');";
mysqli_query($dab,$sql);
}
?>





    create post
<textarea name="timelinep" type="comment" placeholder="  &#128521  What's in your mind? <?php echo $_SESSION['username']; ?>...." id="biotime" class="form-control" ></textarea>
<div>
<button id="timep" class="btn btn-primary" type="submit" name="timeline" disabled>Post</button>
</div>  </div></div>
<div class="col-sm-6" style="text-align:center;">

<div style="margin-top:20px;">
<img src="TELEX_yellow.png"  width="320" height="100" >
</div>
</div>

                </div>



<script>
                $(document).ready(function(){
    $('#biotime').keyup(function(){
            $("#timep").removeAttr("disabled");
     })
})
</script>


                </div>
 </div>










<div id="resul">















 <div class="row">
   <div class="col-sm-12">
<?php 
$usernamed1=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
$sql = "CREATE TABLE `temppost` (
     id  INT(6) UNSIGNED AUTO_INCREMENT , 
     dat VARCHAR(255) ,
     user VARCHAR(255),
     post VARCHAR(255),
     caption VARCHAR(255),
     lik VARCHAR(255) ,
     comment VARCHAR(255),
     ids VARCHAR(255),
     PRIMARY KEY(id)
  )";
  mysqli_query($db, $sql);
 
  $dab= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
  $sql="SELECT * FROM `post`";
  $result=mysqli_query($dab,$sql);
  if($result)
{
  while($row=mysqli_fetch_assoc($result))
{
 
  $user=$row['user'];
  $db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
  $sl="SELECT DISTINCT user FROM `connect` WHERE stat='connected';";
  $resul=mysqli_query($db,$sl);
  if($resul)
{
  while($ro=mysqli_fetch_assoc($resul))
{
  
  $user1=$ro['user'];
  $user2=$_SESSION['username'];
  if(($user==$user1)||($user==$user2))
  {
    
    $dt=$row['dat'];
    $igs=$row['id'];
    $user=$row['user'];
    $p=$row['post'];
    $cap=$row['caption'];
    $li=$row['lik'];
    $comm=$row['comment'];
    $usernamed1=$_SESSION['username'];
    $db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
    $sql="INSERT INTO `temppost` (`dat`,`user`,`post`,`caption`,`lik`,`comment`,`ids`) VALUES ('$dt','$user','$p','$cap','$li','$comm','$igs');";
    mysqli_query($db,$sql);
     
  }
}
}
}
}
?>

<?php 
  $db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
  $sql="SELECT DISTINCT post , user , dat, caption , lik , comment, ids FROM `temppost` ORDER BY dat DESC; ";
  $results=mysqli_query($db,$sql);
  if($results)
  {
 
    while($rows=mysqli_fetch_assoc($results))
  {
    
  
     $im=$rows['post'];
     $capt=$rows['caption'];
     $dt=$rows['dat'];
     $user=$rows['user'];
     $post='post/'.$im;
    $pc=$rows['ids'];
    $j="bp".$pc;
    $ps=$rows['ids'];
    $pp='comment'.$pc;
    $pl='like'.$rows['ids'];
    $pct=$rows['ids'];
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
?>
<div class="timeline" style="width:480px;">
 <div class="row">


    
     
   
     <div class="col-sm-12">
     <div class="mamai">
    
         <p> <button  style="background:none; border:none;"  name="<?php echo $isn; ?>"  type="submit" ><img src="<?php echo $image;?>"  height="60" width="60" style="border-radius: 50%;" id="display profile"/></button> <?php echo $dt; ?> <strong><?php echo $user; ?></strong>
     




         <button style="float:right;color:rgb(249, 197, 28);background:none; border:none;" onclick="navpulla('<?php echo $pct; ?>','<?php echo $user; ?>');"   type="button"  ><i class="fas fa-list-ul w3-xxlarge">
          </i>

        </button></p>
     </div>
  </div> 
    </div>



    <?php    $popt='opt'.$rows['ids'];   ?>
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


<?php
$usernamed1=$_SESSION['username'];
 $user=$rows['user'];
$dba= mysqli_connect('localhost','root','',$user)or die("could not connect database..");
$sql="SELECT user FROM `notification` WHERE  msg='$ps' AND user='$usernamed1';";
$resug=mysqli_query($dba,$sql);
if($resug)
{
  
 $rowc=mysqli_fetch_assoc($resug);
 $usernamed1=$_SESSION['username'];
    $userc=$rowc['user'];
    if($userc==$usernamed1)
{
?>
<div class="row">
<div class="col-sm-12 ">
<div class="mamay">

    <p><button type="button"  onclick="liker('<?php echo $ps; ?>','<?php echo $user; ?>');" id="<?php echo $pl?>" style="color:rgb(23, 152, 192);background:none; border:none;" >
    <i class="	fa fa-heart-o w3-xxlarge"></i></button> 
     <button  type="button" style="background:none; border:none; color:black;" onclick="commentbx('<?php echo $pct; ?>','<?php echo $user; ?>')" name="<?php echo $pct ?>">
     <i class="fa fa-commenting-o w3-xxlarge"></i></button></p>
</div>
</div> </div>


<?php }
else
{  ?>

<div class="row">
<div class="col-sm-12 ">
<div class="mamay">

    <p><button type="button"  style="background:none; border:none; color:black;"  id="<?php echo $pl?>" onclick="like('<?php echo $ps; ?>','<?php echo $user; ?>');" >
    <i class="	fa fa-heart-o w3-xxlarge"></i></button>  
    
    <button type="button" style="background:none; border:none; color:black;" onclick="commentbx('<?php echo $pct; ?>','<?php echo $user; ?>')" name="<?php echo $pct ?>"><i class="fa fa-commenting-o w3-xxlarge"></i></button></p>
</div>
</div> </div>

<?php
}
} else{
  
?>

<div class="row">
<div class="col-sm-12 ">
<div class="mamay">

    <p><button type="button" style="background:none; border:none; color:black;" id="<?php echo $pl?>" onclick="like('<?php echo $ps; ?>','<?php echo $user; ?>');" ><i class="	fa fa-heart-o w3-xxlarge">
    </i></button>    <button  type="button" style="background:none; border:none; color:black;" onclick="commentbx('<?php echo $pct; ?>','<?php echo $user; ?>')" name="<?php echo $pct ?>"><i class="fa fa-commenting-o w3-xxlarge"></i></button></p>
</div>
</div> </div>




<?php } ?>
<div class="row">
<div class="col-sm-12 ">
<div class="mamay">

    <p><a href=""><strong>
    
    <?php 
$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="SELECT lik FROM `post` WHERE  id='$ps';";
$resug=mysqli_query($db,$sql);
if($resug){
$rowl=mysqli_fetch_assoc($resug);
$lik=$rowl['lik'];
echo $lik;}
?>
    
    
    
    
    
    
    
    
    
    </strong></a>Likes     <a href=""><strong>
    
    
        
    <?php 
$db= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
$sql="SELECT comment FROM `post` WHERE  id='$ps';";
$resug=mysqli_query($db,$sql);
if($resug){
$rowl=mysqli_fetch_assoc($resug);
$lik=$rowl['comment'];
echo $lik;}
?>
    
   
    
    
    
    
    
    
    </strong></a>Comments</p>
</div>
</div> </div>

<?php    $pctb='commentbox'.$rows['ids'];   ?>
<div class="row">
<div class="col-sm-12 form-group">
<div class="mamay">

    <div id="<?php echo $pctb ?>"></div>
</div>
</div> </div>

<div class="row">
<div class="col-sm-12 form-group">
<div class="mamay">

    <p><input type="text" style="width:80%;" name="<?php echo $pp;?>" id="<?php echo $pp;?>" placeholder="Add Comments.."><button name="<?php echo $j;?>" id="<?php echo $j;?>"  onclick="addcomment('<?php echo $ps; ?>','<?php echo $user; ?>','<?php echo $im; ?>');" type="submit" disabled>post</button></p>
</div>
</div> </div>


<?php
if(isset($_POST[$j]))
{
  $e=$_POST[$pp];
  date_default_timezone_set("Asia/Kolkata");
  $dt=date("Y-m-d H:i:s");
  $usernamed1=$_SESSION['username'];
    $usernamed=$user;
     $dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
     $mg=$pc;
    $sql = "INSERT INTO `comment`(`dat`,`msg`,`user`,`post`,`stat`) VALUES ('$dt','$e','$usernamed1','$im','$mg');";
    mysqli_query($dba, $sql);
  }
?>



<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#<?php echo $pp;   ?>').keyup(function(){
          
            $("#<?php echo $j;?>").removeAttr("disabled");
     })
})
function addcomment(post,user,p)
{
  var cd= document.getElementById("<?php echo $pp;?>").value;
  console.log(cd);
 $.ajax({
  
    url:"addcomment.php",
    method:"post",
    data:{Id:post,
          user:user,
          p:p,
          c:cd
    },
    success:function(res){
        console.log(res);
    }
    
  })
}
function commentbx(id,user)
{
   var idc='commentbox'+id;
    $.ajax({
              url:"commentbox.php",
              method:"post",
              data:{id:id,
                    user:user 
                     },
              dataType:"text",
              success:function(data)
              {
                  $('#'+idc).html(data);
              }
          });
  
  
   
}
function navpulla(id,user)
{
   var idc='opt'+id;
    $.ajax({
              url:"navpulla.php",
              method:"post",
              data:{id:id,
                    user:user 
                     },
              dataType:"text",
              success:function(data)
              {
                  $('#'+idc).html(data);
              }
          });
  
  
   
}
function delpost(id)
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
function prou(user)
{
 
   $.ajax({
   
            url:"viewup.php",
            method:"post",
            data:{
                 user: user
                },
          dataType:"text",
        
             });
}
function disconnectu(id,user)
{
  $.ajax({
   
   url:"disconnect.php",
   method:"post",
   data:{
         id:id,
        user: user
       },
 dataType:"text",
    });
}
function cutma(id)
{
  
 var idpu='commentbox'+id;
 var yo=document.getElementById(idpu);
 yo.innerHTML="";
}
</script>



</div>

<?php
  }}
?>





</div></div>














</div>











</form>


</body>
	  
	   </html>
     <?php
     
     $usernamed1=$_SESSION['username'];
     $db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
     $sql="DROP TABLE temppost;";
     mysqli_query($db,$sql);
     ?>