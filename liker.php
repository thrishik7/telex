<?php 
  session_start();
  $C=$_POST['Id'];
  $us=$_POST['user'];
  $dab= mysqli_connect('localhost','root','','telex')or die("could not connect database..");
  $sql="SELECT * FROM `post` WHERE id='$C';";
  $result=mysqli_query($dab,$sql);
  if($result)
  { 
    while($row=mysqli_fetch_assoc($result))
    {
        $like=$row['lik'];
        
        $like--;
        $sql="UPDATE `post` SET lik='$like' WHERE id='$C';";
        mysqli_query($dab,$sql);



    }


    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y-m-d H:i:s");
    $usernamed1=$_SESSION['username'];
      $usernamed=$us;
       $dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
       $mg=$C;
  
      $sql="DELETE FROM `notification` WHERE msg='$mg' AND user='$usernamed1';";
      mysqli_query($dba, $sql);
  }


  ?>











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
<?php
     
     $usernamed1=$_SESSION['username'];
     $db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
     $sql="DROP TABLE temppost;";
     mysqli_query($db,$sql);
     ?>
