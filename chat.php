<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>simpleFB</title>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "users.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
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
<form action="combine.php" method="get">
<input list="txtHint" class="input1" type="text" name="tempuser" placeholder="search..." onkeyup="showHint(this.value)" autocomplete="off">
<datalist id="txtHint">

</datalist>
<button type="submit" class="button">
Start Chat
</button>
</form>

<br><br>
<?php
if (isset($_SESSION["check"])) 
{
if($_SESSION["check"] == 3)
{
echo "<div><b>person is not a part of SFB<b/></div>";
}
}
?><br>
<div id="large">
&#128517;
</div>
<div id="request">
<?php
echo "Hi  ".$_SESSION["username"]."<BR> ";
?>
Please choose someone to chat with, from above search
</div>
</center>
</body>
</html>