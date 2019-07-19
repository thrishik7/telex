<?php
 $db= mysqli_connect('localhost','root','', 'projectusers')or die("could not connect database..");
 $output="";
 $name=$_POST['search'];
 $sql="SELECT username,email FROM user2 WHERE username LIKE '%".$name."%';";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
     $output.='<div class="row">';
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
      
      <div class= "col-sm-3">
      <div class="baaa">
      <img src="'.$img.'"  height="180" width="230" />
      <div>
      <p>'.$usar.'</p>
      </div>
      <div>
      <p>'.$emeil.'</p>
      </div>
      <button class="btn btn-warning"  name="'.$usar.'" type="submit" >View Profile</button>

      </div>
      </div>

      
      
      ';


     }

     $output.='</div>';
    echo $output;
 }
else
{
    echo 'Usename Not Found' ;
}
?>