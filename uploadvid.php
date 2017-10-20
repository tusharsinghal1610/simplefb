<?php
session_start();
$check=0;
$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 200000000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      $check=1;
      }
    }
 }
else
  {
  echo "Invalid file";
  }

if($check==1)
{
	
$first=$_SESSION["usert"];
$second=$_SESSION["userm"];
$third=$_SESSION["username"];
$filer= $first."vs".$second.".txt";

$file_data="";
$file_data .= file_get_contents("$filer");
$message = explode("<", $file_data);
if(strpos("$message[3]", "videootus")==1)
{
$liner = (int)$message[4] + 1;
}
else
{
$liner = (int)$message[3] + 1;
}
	
$file_data = "<upload/".$_FILES["file"]["name"]."<".$extension."<@videootus<".$liner."\n";
$file_data .= file_get_contents("$filer");
file_put_contents("$filer", $file_data);




}
?>