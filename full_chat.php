<?php

session_start();


$first=$_SESSION["usert"];
$second=$_SESSION["userm"];
$third=$_SESSION["username"];
$filer= $first."vs".$second.".txt";
$file_data="";
$file_data .= file_get_contents("$filer");

$message = explode("<", $file_data);
$max=count($message)-1;
for($x = $max; $x > 1; $x--) {
   if (isset($message[$x-1]) && isset($message[$x])) 
{
if($message[$x-1]!="")
{
$x=$x-1;
if(strpos("$message[$x]", "$third")==1)
{   
	echo '<div class="marg" align="right"> <div class="righ">'.$message[--$x].'</div></div>';
       	
}
else if(strpos("$message[$x]", "imagetush")==1)
{
       echo '<img src="'.$message[--$x].'" style="width:100%;">';	
     
}
else if(strpos("$message[$x]", "videootus")==1)
{
      	
       echo '<video width="100%" controls style="z-index:0">';
   echo '<source type="video/'.$message[--$x].'" src="'.$message[--$x].'">Your browser does not support the video tag.</video>';
         
}
else
{
	echo '<div class="marg" align="left"> <div class="lef">'.$message[--$x].'</div></div>';	
       
}

}
else{
	$x--;
         
}
}
}
?>