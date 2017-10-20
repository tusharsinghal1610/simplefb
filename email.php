<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>simpleFB</title>
<style>
#top
{
color:white; 
background-color:#0000e6;
}
.input1 {
    width: 100%;
    padding: 12px 20px;
    margin: 2px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #0000e6;
}
.button{
width:60%;
padding: 12px 20px;
border: 2px solid #0000e6;
background-color:#4d4dff;
color:white;

}
a{
text-decoration:none;}
b{
	color:red;
}
</style>
</head>
<body>
<center>
<h1 id="top">
FB
<sub>simple</sub>
</h1>
<form action="gmail.php" method="get">
<h3>Enter Email</h3>
<input class="input1" type="text" name="email" autocomplete="off">
<br><br>

<br>
<button type="submit" class="button">
Email me
</button>
</form>

</center>
</body>
</html>