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
#large
{
font-size:50px;}
#request
{
font-size:40px;
color:grey;}
.button{
width:60%;
padding: 12px 20px;
border: 2px solid #0000e6;
background-color:#4d4dff;
color:white;

}
a{
text-decoration:none;}
</style>
</head>
<body>

<center>
<h1 id="top">
FB
<sub>simple</sub>
</h1>
<a href="message.php">
<button class="button">
Back to CHAT
</button>
</a>
<br><br>
<div id="large">
&#128521;
</div>
<div id="request">
your chat has been sent to provided email
</div>
</center>
</body>
</html>