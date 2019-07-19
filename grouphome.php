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


$db= mysqli_connect('localhost','root','', 'telexgroup')or die("could not connect database..");
$sql="SELECT * FROM grouptel;";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {  while($row=mysqli_fetch_array($result))
     {
       $usar1=$row['groupname'];
       $usaa=$row['admint'];
       
     if(isset($_POST[$usar1]))
{

    $_SESSION['admin']=$usaa;
    $_SESSION['viewg']=$usar1;
    $bay=$_SESSION['viewg'];
    header("location: viewg.php?ID=$bay");

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
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
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
               <li class="active" ><a href="search.php"><i class="fa fa-users w3-xxlarge"></i></a></li>
               
               <li ><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
               <li><a href="addgrou.php" title="add group"><i class="fa fa-plus-circle w3-xxlarge"></i></a></li>
               
               <li><a href="message.php"><i class="fa fa-comments w3-xxlarge"></i></a></li>
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


<div class="row">
   <div class="col-sm-12">
<?php 

$usernamed1=$_SESSION['username'];
$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
?>

<?php 

  $db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
  $sql="SELECT * FROM `grouppost` WHERE kind='3' ORDER BY dat DESC;  ";
  $results=mysqli_query($db,$sql);
  if($results)
  {
     while($rows=mysqli_fetch_assoc($results))
  {
    
     $groupname=$rows['groups'];
     $kind=$rows['kind'];
     $dbaab= mysqli_connect('localhost','root','','telexgroup')or die("could not connect database..");
     $sql="SELECT * FROM `grouptel` WHERE `groupname`='$groupname';";
     $resd=mysqli_query($dbaab,$sql);
     if($resd)
     {
        $rowq=mysqli_fetch_assoc($resd);
        $ima2=$rowq['cole1'];
        $image2='images/'.$ima2;
 
     }
     $im=$rows['post'];
     $capt=$rows['caption'];
     $dt=$rows['dat'];
     $user=$rows['users'];
     $post='post/'.$im;
    $pc=$rows['id'];
    $j="bp".$pc;
    $ps=$rows['id'];
    $pp='comment'.$pc;
    $pl='like'.$rows['id'];
    $pct=$rows['id'];
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
if($kind==3)
{

?>
<div class="timeline" style="width:480px;">
 <div class="row">


    
     
   
     <div class="col-sm-12">
     <div class="mamai">
    
         <p> <button  style="background:none; border:none;"  name="<?php echo $isn; ?>"  type="submit" ><img src="<?php echo $image2;?>"  height="50" width="50" style="border-radius: 50%;" id="display profile"/>
      </button> <?php echo $dt; ?> <strong><?php echo $user; ?></strong></p>
     </div>
  </div> 
    </div>



    <?php    $popt='opt'.$rows['id'];   ?>
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

    <div class="row">
<div class="col-sm-12 form-group">
<div class="mamay">

    <p><input type="text" style="width:80%;" name="<?php echo $pp;?>" id="<?php echo $pp;?>" placeholder="Add Comments.."><button name="<?php echo $j;?>" id="<?php echo $j;?>"  onclick="addcomment('<?php echo $ps; ?>','<?php echo $user; ?>','<?php echo $im; ?>');" type="submit" disabled>post</button></p>
</div>
</div> </div>

</div>

<?php
   }
}} 


$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");
$sql="SELECT DISTINCT qn1, groups, qndesc, users FROM `grouppost` WHERE kind='2' ORDER BY dat DESC;  ";
$results=mysqli_query($db,$sql);
if($results)
{
   while($rows=mysqli_fetch_assoc($results))
{
$user=$rows['users'];
$groupname=$rows['groups'];
$qn1=$rows['qn1'];
$qnd=$rows['qndesc'];
$dbaab= mysqli_connect('localhost','root','','telexgroup')or die("could not connect database..");
$sql="SELECT * FROM `grouptel` WHERE `groupname`='$groupname';";
$resd=mysqli_query($dbaab,$sql);
if($resd)
{
   $rowq=mysqli_fetch_assoc($resd);
   $ima2=$rowq['cole1'];
   $image2='images/'.$ima2;

}


?>
<div class="timeline" style="width:480px;">
 
     
   <div class="row">
<div class="col-sm-12">
     <div class="mamai">
    
         <p> <button  style="background:none; border:none;"  name="<?php echo $isn; ?>"  type="submit" ><img src="<?php echo $image2;?>"  height="50" width="50" style="border-radius: 50%;" id="display profile"/>
      </button><strong><?php echo $user; ?></strong></p>
     </div>
  </div> 
    </div>



<div class="row">
    <div class="col-sm-12">
     <div class="mamai">
    
         <p><strong><?php echo $qn1; ?></strong></p>
     </div>
  </div> 
    </div>
<div class="row">
    <div class="col-sm-12">
     <div class="mamai">
    
         <p>Description: <?php echo $qnd; ?></p>
     </div>
  </div> 
    </div>
    <div id="resultp">

<?php                

$db= mysqli_connect('localhost','root','',$usernamed1)or die("could not connect database..");


$sql="SELECT SUM(voting) FROM `grouppost` WHERE qn1='$qn1' ";
$resultSs=mysqli_query($db,$sql);

if($resultSs){
   $rowv=mysqli_fetch_assoc($resultSs);
   $votes=$rowv['SUM(voting)'];
}

$sql="SELECT * FROM `grouppost` WHERE qn1='$qn1' ";
$resultsv=mysqli_query($db,$sql);
if($resultsv)
{
    $j=0;
   while($rowff=mysqli_fetch_assoc($resultsv))
{

    $an=$rowff['answers'];
    $color=$rowff['cole1'];
    $vote=$rowff['voting'];
    if($votes==0)
    {
        $vts=0;
    }
    else
    $vts= ($vote/$votes)*100;
  $j++;
  $bnn=$qn1.'op';
?>


<div class="row">
    <div class="col-sm-6" style="text-algin:center;">
     <div  style="text-algin:center;">
    
         <p><input type="radio"  name="<?php echo $qn1; ?>" value="<?php echo $an; ?>" Required><strong> <?php echo $an; ?></strong></p>
     </div>
  </div> 
  <div class="col-sm-6" style="text-algin:center;">
     <div  style="text-algin:center;">
    
         <p><input style="width:<?php echo $vts.'%'; ?>; background:<?php echo  $color;  ?>; border:none;" ></p>
     </div>
  </div> 
    </div>

   



<?php } } ?></div>

<div class="row">
    <div class="col-sm-12">
     <div class="mamai">
    <?php
    $usernamed=$_SESSION['username'];
$dab= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
$sql="SELECT DISTINCT users FROM `$qn1` WHERE `users`='$usernamed';";
$resultss=mysqli_query($dab,$sql);
if($resultss)
{
    $rowss=mysqli_fetch_assoc($resultss);
    $uuss=$rowss['users'];
    if($uuss==$usernamed)
    {
?>
         <p><button id="timepoll"  class="btn btn-warning" type="button" onclick="poll('<?php echo $qn1; ?>','<?php echo $_SESSION['username']; ?>','<?php echo $groupname; ?>')" disabled>vote</button></p>
<?php
}
else
{
?>
  <p><button id="timepoll" class="btn btn-warning" type="button" onclick="poll('<?php echo $qn1; ?>','<?php echo $_SESSION['username']; ?>','<?php echo $groupname; ?>')">vote</button></p>



<?php  } }?>



<?php $bnn=$qn1.'op'; ?>

<script>

function poll(qn, user, group)
{
    $("#timepoll").prop("disabled",true);

    var msg= $('input[name="'+qn+'"]:checked').val();
    console.log(msg);
    $.ajax({
  
  url:"pollrect.php",
  method:"post",
  data:{ 
      qn:qn,
      user:user,
      groupname:group,
      msg:msg
     
  },
  dataType:"text",
  success:function(data){
    $('#resultp').html(data);
  }
  

})

}





</script>



     </div>
  </div> 
    </div>



    </div>








<?php 
}} 
?>





</div></div>
























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
              url:"fetchg.php",
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
              url:"fetchg.php",
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