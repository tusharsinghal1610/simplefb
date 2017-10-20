<?php

session_start();



$first=$_SESSION["usert"];
$second=$_SESSION["userm"];
$third=$_SESSION["username"];
$filer= $first."vs".$second.".txt";
$q = htmlspecialchars($_REQUEST["q"]);             //request



$file_data="";
$file_data .= file_get_contents("$filer");

if( $file_data == "")
{
$liner=1;
}
else{
	$message = explode("<", $file_data);
if(strpos("$message[3]", "videootus")==1)
{

$liner = (int)$message[4] + 1;
}
else
{

$liner = (int)$message[3] + 1;
}

}
if($q!=""){                  
$file_data = "<".$q."<@".$third."<".$liner."\n";

$file_data .= file_get_contents("$filer");
file_put_contents("$filer", $file_data);

}else{
	$file_data="";
	$file_data .= file_get_contents("$filer");
}
$message = explode("<", $file_data);
$countee=0;
$y=$_SESSION["counter"];
if($liner==1)
{
$countee=0;
}
else if($y<$liner)
{


while((int)$message[$countee]!=$y)
{
$countee++;
}
}
else
{
$_SESSION["counter"]=$liner+1;
}
$bountee=0;



for($x = $countee; $x > 1; $x--) {
   
if (isset($message[$x-1]) && isset($message[$x])) 
{
if($message[$x-1]!="")
{
$x=$x-1;
if(strpos("$message[$x]", "$third")==1)
{   
	echo '<div class="marg" align="right"> <div class="righ">'.$message[--$x].'</div></div>';
       	$bountee++;
}
else if(strpos("$message[$x]", "imagetush")==1)
{
       echo '<img src="'.$message[--$x].'" style="width:100%;">';	
       $bountee++;  
}
else if(strpos("$message[$x]", "videootus")==1)
{
      	
       echo '<video width="100%" controls style="z-index:0">';
   echo '<source type="video/'.$message[--$x].'" src="'.$message[--$x].'">Your browser does not support the video tag.</video>';
         $bountee++;      
}
else
{
	echo '<div class="marg" align="left"> <div class="lef">'.$message[--$x].'</div></div>';	
         $bountee++;
}

}
else{
	$x--;
         
}
}
}

$y= $y + $bountee;
$_SESSION["counter"]= $y;
?>