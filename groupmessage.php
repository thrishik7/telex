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
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
<title>Home Page</title>
</head>
  <body>
 
  <form  method="post"  action="viewg.php" enctype="multipart/form-data">
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
               <li  ><a href="grouphome.php"><i class="fa fa-users w3-xxlarge"></i></a></li>
               
               <li  ><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
               <li ><a href="addgrou.php" title="add group"><i class="fa fa-plus-circle w3-xxlarge"></i></a></li>
               
               <li class="active"><a href="groupmessage.php"><i class="fa fa-comments w3-xxlarge"></i></a></li>
             </ul>

        </nav>

</div></div>




</div>
<div class="row">

<div class="col-sm-6">
<div class="msgs">
<div id="result">
<?php



$db=mysqli_connect('localhost','root','','telexgroup')or die("could not connect database.."); 
$sql="SELECT * FROM `grouptel`;";
$result=mysqli_query($db,$sql);
if($result)
{

 while($row=mysqli_fetch_assoc($result)){
 $groupname=$row['groupname'];

 $dp =$row['cole1'];
 $bio=$row['groupdescription'];
 $img='images/'.$dp;
 $id=$row['id'];
     $dv=mysqli_connect('localhost','root','',$groupname)or die("could not connect database.."); 
     $sqlb="SELECT * FROM `connect` WHERE users='$usernamed';";
     $resd=mysqli_query($dv,$sqlb);
     if($resd){
        $rq=mysqli_fetch_assoc($resd);
        $usss=$rq['users'];
        if($usss==$usernamed)
        { 

        


    ?>
    <div class="baaai">
      <button  type="button"
       style="background:none; border:none; display:block; " 
       onclick="make_chat_dialog_box('<?php echo $id ?> ','<?php echo $groupname ?>')" >
      <div class= "col-sm-12">
      
    
     <img src="<?php echo $img ?>"/><b><?php echo $groupname ?></b>
        <?php $idc='user_model_details'.$id ?>
      
      
      </div></button>  </div> 
      <div id=<?php echo $idc ?> style="background:white; ">
     </div>

<?php 

    }}}}


?>








</div>
</div>
</div>




</div>

</form>

<script>

function cutma(id)
{
  
 var idpu='user_model_details'+id;
 var yo=document.getElementById(idpu);
 yo.innerHTML="";


$.ajax({
   




});




}





 







    function yo(){
  $( function() {
    $( "#dialog" ).dialog();
  } );
    }
  </script>
</head>
<body>
 

  
</body>
	  
       </html>
       
<script>

function msg(id,user)
{
  var idc='chatting'+id;
  var idm='wow'+id;
  var msg= $('#'+idm).val();
  console.log(msg);
    $.ajax({
              url:"addmsgg.php",
              method:"post",
              data:{id:id,
                    sms:msg,
                    user:user 
                     },
              dataType:"text",
              success:function(data)
              {
                  $('#'+idc).html(data);
              }
          });
  
  
   
    }
 






$(document).ready(function(){
    $('#search_text').keyup(function(){
       var txt= $(this).val();
       if(txt != '')
       {
        $('#result').html('');
          $.ajax({
              url:"fetchm.php",
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
              url:"fetchm.php",
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

function make_chat_dialog_box(id,user)
{
   var idc='user_model_details'+id;
    $.ajax({
              url:"chatg.php",
              method:"post",
              data:{id:id,
                    groupname:user 
                     },
              dataType:"text",
              success:function(data)
              {
                  $('#'+idc).html(data);
              }
          });
  
  
   



}



</script>