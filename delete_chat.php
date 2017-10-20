<?php
session_start();

$first=$_SESSION["usert"];
$second=$_SESSION["userm"];
$filer= $first."vs".$second.".txt";

$myfile = fopen("$filer", "w") or die("Unable to open file!");
$_SESSION["counter"]=1;
echo "your conversation deleted";
?>