<?php

session_start();

$pass=$_POST["pw"];
$name=$_POST["username"];

if(strpos("$name"," "))
{
	$_SESSION["check"] = 2;
   header("Location: createaccount.php");
   exit();
}
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
$sql = "INSERT INTO users (username, password)
VALUES ('$name','$pass')";

if ($conn->query($sql) === TRUE) {
  
	
	
	
	$myfile = fopen("users.php", "w") or die("Unable to open file!");
	
	
	$sql = "SELECT username FROM users";
	$result = $conn->query($sql);

			$txt = "<?php\n";
            fwrite($myfile, $txt);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			
			$txt = '$a[] = "'.$row["username"].'";';
            fwrite($myfile, $txt);
			$txt = "\n";
			fwrite($myfile, $txt);
		}
		
		
		
		

	$txt='// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = "<option value = $name>";
            } else {
                $hint .= "<option value = $name>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;';
fwrite($myfile, $txt);	
		
		
             $txt = "\n";
			fwrite($myfile, $txt);
		
		
		
			$txt = "?".">";
            fwrite($myfile, $txt);
		
		
	} else {
		echo "0 results";
	}
	
	
	
	
	
	
	
	
	
	
	
	
	fclose($myfile);
	
	
	
	
	
} else {
	$_SESSION["check"] = 1;
   header("Location: createaccount.php");
   exit();
}
$_SESSION["username"] = $name;
$_SESSION["password"] = $pass;
header("Location: chat.php"); /* Redirect browser */
$conn->close();
?>