<?php

session_start();

$servername = "localhost";
$username = "id2259670_u249309811_sfb";
$password = "mayanktushar";
$dbname = "id2259670_u249309811_users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$tempuser=$_GET["tempuser"];
$mainuser=$_SESSION["username"];
$_SESSION["temp"]=$tempuser;
$sql = "SELECT * FROM users WHERE username='$tempuser' OR username='$mainuser' ORDER BY username;";
$result = $conn->query($sql);

if ($result->num_rows == 2) {
    
	
	$_SESSION["check"]=0;
	$count=1;
    while($row = $result->fetch_assoc()) {
        
		
		if($count==1){
			$_SESSION["usert"]= $row["username"];
			$count++;
		}
		else{
			
			$_SESSION["userm"]= $row["username"];
			
		}
   
    }
	
}	
 else {
        $_SESSION["check"]=3;
		header("Location: chat.php");
        exit();		
}

$first=$_SESSION["usert"];
$second=$_SESSION["userm"];
$filer= $first."vs".$second.".txt";

$myfile = fopen("$filer", "a") or die("Unable to open file!");
fclose($myfile);


$file_data="";
$file_data .= file_get_contents("$filer");
if($file_data=="")
{
$_SESSION["counter"]=1;
}
else
{
$third=$_SESSION["username"];
$message = explode("<", $file_data);
$length=sizeof($message);
$x=0;

for($x=0;$x<$length;$x++)
{
if(strpos("$message[$x]", "$third")==1)
break;
}
$x=$x+1;
if (isset($message[$x-1]))
$_SESSION["counter"]=(int)$message[$x];
else
$_SESSION["counter"]=1;
}
header("Location: message.php"); /* Redirect browser */
$conn->close();
?>