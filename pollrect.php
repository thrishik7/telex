<?php 
session_start();
$user=$_POST['user'];
$groupname=$_POST['groupname'];
$vote=$_POST['msg'];
$qn1=$_POST['qn'];
$dab= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
$sql="SELECT * FROM `post` WHERE  `qn1`='$qn1' AND `answers`='$vote';" ;
$result=mysqli_query($dab,$sql);
if($result)
{ 
  while($row=mysqli_fetch_assoc($result))
  {
      $like=$row['voting'];
      $like++;  
      $sql="UPDATE `post` SET voting='$like' WHERE  `qn1`='$qn1' AND `answers`='$vote';";
      mysqli_query($dab,$sql);  
  }}



      
  $dab= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
  $sql="SELECT * FROM `connect` WHERE stat='connected' OR stat='admin'";
  $result=mysqli_query($dab,$sql);
  if($result)
  {
      while($row=mysqli_fetch_assoc($result))
      {
          $namepul=$row['users'];
      
  $dsb= mysqli_connect('localhost','root','', $namepul)or die("could not connect database.."); 
  $sql="SELECT * FROM `grouppost` WHERE  `qn1`='$qn1' AND `answers`='$vote';" ;
  $resultsss=mysqli_query($dsb,$sql);
  if($resultsss)
  { 
    while($rows=mysqli_fetch_assoc($resultsss))
    {
        $like=$rows['voting'];
        $like++;  
        $sql="UPDATE `grouppost` SET voting='$like' WHERE  `qn1`='$qn1' AND `answers`='$vote';";
        mysqli_query($dsb,$sql);  
    }}
      }
  }
  


  $dab= mysqli_connect('localhost','root','', $groupname)or die("could not connect database.."); 
  $sql="INSERT INTO `$qn1` (`users`,`$vote`) VALUES ('$user','$user');" ;
   mysqli_query($dab,$sql);
 
$output='';


$db= mysqli_connect('localhost','root','',$user)or die("could not connect database..");


$sql="SELECT SUM(voting) FROM `grouppost` WHERE qn1='$qn1' ";
$resultSs=mysqli_query($db,$sql);

if($resultSs){
   $rowv=mysqli_fetch_assoc($resultSs);
   $votes=$rowv['SUM(voting)'];
}

$sql="SELECT * FROM `grouppost` WHERE `qn1`='$qn1' ";
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

$output.='<div class="row">
<div class="col-sm-6" style="text-algin:center;">
 <div  style="text-algin:center;">
    
     <p><input type="radio" id="'. $j.'" name="'.$qn1.'" value="'.$an.'" Required><strong>'.$an.'</strong></p>
 </div>
</div> 
<div class="col-sm-6" style="text-algin:center;">
 <div  style="text-algin:center;">

     <p><input style="width:'.$vts.'%; background:'.$color.'; border:none;" ></p>
 </div>
</div> 
</div>';
}
}
echo $output;






?>