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

<script>









</script>
<script>
    function triggerClick(){
document.querySelector("#messImage").click();




}





    </script>




<title>Home Page</title>
</head>

  <body>
 
  <form  method="post"  enctype="multipart/form-data" >
      <div class="formx">
<div class="row">
  <div class="col-sm-4">

  <div class="dfc">
  
  <input type="text" placeholder="Search..." name="search_text" id='search_text'>
  <button class="btn btn-primary btn-xs start_chat"   type="button" id='search1'><i class="fa fa-search w3-large"></i></button>
</div>
  
</div>
<div class="col-sm-8">
        <nav>
             <ul>

               <li ><a href="index.php"><i class="fa fa-home w3-xxlarge"></i></a></li>
               <li  ><a href="search.php"><i class="fa fa-search w3-xxlarge"></i></a></li>
               
               <li ><a href="profile.php"><i class="fa fa-user w3-xxlarge"></i></a></li>
               <li><a href="add.php"><i class="fa fa-plus-square-o w3-xxlarge"></i></a></li>
               
               <li class="active"><a href="message.php"><i class="fa fa-send w3-xxlarge"></i></a></li>
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




</div>
<div class="row">
<input type="file" name="dp" id="messImage"  style="display:none;">

</div>



<div class="row">

<div class="col-sm-6">
<div class="msgs">
<div id="result">
<?php



$db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");
$output="";
$USER=$_SESSION['username'];
$sql="SELECT * FROM user2 WHERE  username=' ' ";

$dab= mysqli_connect('localhost','root','',$USER)or die("could not connect database..");
$sl="SELECT DISTINCT user FROM `connect` WHERE stat='connected';";
$resultu=mysqli_query($dab,$sl);
if($resultu)
{
  while($row=mysqli_fetch_array($resultu))
  {
    
    $userd= $row['user'];
   
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

<div id=<?php echo $idp;?>>
       <div id=<?php echo $idc ?> style="background:white; ">
    <div class="baaai">
      <button  type="button" style="background:none; border:none; display:block; " onclick="make_chat_dialog_box('<?php echo $id ?> ','<?php echo $usar ?>')" >
      <div class= "col-sm-12">
       <img src="<?php echo $img ?>"/><b><?php echo $usar ?></b>
    
      
      
      </div></button>  </div> 
   
     </div></div>

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








</div>
</div>
</div>


  </div>

</div>

</form>

<script>

function cutma(id,user)
{
  
 var idpu='userpo'+id;


$.ajax({
     url:"closee.php",
     method:"post",
     data:{id:id,
           user:user
     
     },
     dataType:"text",
     success:function(data)
     {
       $('#'+idpu).html(data);
     }
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
              url:"addmsg.php",
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
              url:"chat.php",
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

function kill(user,id)
{
  console.log("yo");
  console.log(user);
  var property= document.getElementById("messImage").files[0];


var  form_data= new FormData();
form_data.append("file",property);

console.log(form_data);
$.ajax({
       url:"photomsg2.php",
  
       type:'POST',
       data:{
             id:id,
             user:user,
            
       },
       dataType:"text",
     

     
   });
 
   $.ajax({
       url:"photomsg.php",
  
       type:'POST',
       data:form_data,
       dataType:"text",
       contentType:false,
       cache:false,
       processData:false,
          
       success:function(data)
       {
        $('#what').html(data);
       }
   });
 


 }

</script>