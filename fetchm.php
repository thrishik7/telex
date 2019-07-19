<?php
 session_start();
 $USER=$_SESSION['username'];
 $db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");
 $output="";
 $name=$_POST['search'];
 $sql="SELECT username,email FROM user2 WHERE username LIKE '%".$name."%' AND  NOT username='$USER';";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
    
     while($row=mysqli_fetch_array($result))
     {
         $usar=$row['username'];
         $emeil=$row['email'];
         $dba= mysqli_connect('localhost','root','', $usar)or die("could not connect database.."); 
         $sql="SELECT * FROM `profile`";
         $results=mysqli_query($dba, $sql); 
         $rows=mysqli_fetch_array($results);
         $dp =$rows['dp'];
         $img='images/'.$dp;
       
         $output.='
         <a href="">
         <div class= "col-sm-12">
         <div class="baaai">
        <img src="'.$img.'"/><b>'.$usar.'</b>
         </div>
         
         </div></a>';
   

     
     }
   

    echo $output;
 }
else
{
    echo 'Usename Not Found' ;
}
?>