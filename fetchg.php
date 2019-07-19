<?php
 $db= mysqli_connect('localhost','root','', 'telexgroup')or die("could not connect database..");
 $output="";
 $name=$_POST['search'];
 $sql="SELECT * FROM grouptel WHERE groupname LIKE '%".$name."%';";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
     $output.='<div class="row">';
     while($row=mysqli_fetch_array($result))
     {
         $usar=$row['groupname'];
         $emeil=$row['admint'];
         $dp =$row['cole1'];
         $img='images/'.$dp;

      $output.='
      
      <div class= "col-sm-3">
      <div class="baaa">
      <img src="'.$img.'"  height="180" width="230" />
      <div>
      <p>'.$usar.'</p>
      </div>
      <div>
      <p>Admin-'.$emeil.'</p>
      </div>
      <button class="btn btn-warning"  name="'.$usar.'" type="submit" >View Group</button>

      </div>
      </div>

      
      
      ';


     }

     $output.='</div>';
    echo $output;
 }
else
{
    echo 'GROUP Not Found' ;
}
?>