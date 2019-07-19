<?php include('server.php') ?>
<?php require './vendor/autoload.php';

$fb= new Facebook\Facebook([
   'app_id' => '457734521692815',
   'app_secret'=> '78247a19ef6081851576e46379dbc6c8',
   'default_graph_version'=>'v2.7'

]);

$helper= $fb->getRedirectLoginHelper();
$login_url= $helper->getLoginUrl("http://localhost/project4/");


?>
<html>
<head>
 <title>Login</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">

 </head>
 <body>
    <div class="row">
   <div class="container">
       


   <ul>
  
   <li class="active"><a href="login1.php">Home</a></li>
   
   <li><a href="contact.php">contact</a></li>

   
</ul></div></div>

<br> 


<div class="row">
<div class="col-sm-6" style="text-algin:center; padding:4%;">

<img src="TELEX_blue.png"  width="530" height="170" >
<p style="color:white;margin-left:30px; font-size:20px;" ><strong>Light years apart, still near ;)</strong></p>
</div>
   <div class="col-sm-6">
   <form action="login1.php" method="post">
    
   <?php include('errors.php') ?>
   <img src="avatar.png" width="42" height="42" class="avatar">
   
   <h2>LOGIN</h2>
    <div>
       <label for="username">Username:</label>
       <input type="text" name="username" required>
    </div>
 
 
    <div>
       <label for="password">Password:</label>
       <input type="password" name="password_1" required>
    </div>
  
      
        <button class="btn btn-primary" type="submit" name="login_user">LOG IN</button>
        
     <p>Not an USER?<a href="registration1.php"><b>register</b></a></p>
     <a class="btn btn-primary" href="<?php echo $login_url ;?>">LOGIN using Facebook</a>
   </form>
</div>
   </body>
   </html>