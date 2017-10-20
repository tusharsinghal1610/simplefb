<?php
session_start();


$check=0;



$target_dir = "uptusharloads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }






// Check if file already exists
if (file_exists($target_file)) {
    
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      
		$check=1;
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
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

	
$file_data = "<".$target_file."<@imagetush<".$liner."\n";
$file_data .= file_get_contents("$filer");
file_put_contents("$filer", $file_data);




}
?>