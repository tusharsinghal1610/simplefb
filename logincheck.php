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
$pass=$_POST["pw"];
$name=$_POST["username"];
$sql = "SELECT * FROM users WHERE username='$name' AND password='$pass';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     $_SESSION["check"] = 0;

   
    }
 else {
    	$_SESSION["check"] = 1;
		header("Location: index.php");
        exit();		
}

$_SESSION["username"] = $name;
$_SESSION["password"] = $pass;
header("Location: chat.php"); /* Redirect browser */
$conn->close();
?>