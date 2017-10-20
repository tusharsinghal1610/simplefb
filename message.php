<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="787294125445-q3nljrrc4k71tklrg2bbsd0r28k10ag5.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>

// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
    
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '258419754660868',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

function logoutfb()
{
FB.logout();
FB.logout(function(response) {
  window.location.href = "index.php";
});
signOut();
} 

 function signOut() {

    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
window.location.href = "index.php";
 
  }






      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
      };







var count=0;
var str="";
	
function assigner()
{   if(document.getElementById("messa").value!="" && count==0)
	{
		count=2;
		messenger();
		callme();
    }
	else if(count==0)
	{
		callme();
	}
	else
	{
		count=2;
		messenger();
	}
}	

function messenger() {
	if(count==2){
	str= document.getElementById("messa").value;
	document.getElementById("messa").value="";
	}else{
		str="";
	}
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                   if(this.responseText!="")
{
                document.getElementById("txtmessage").insertAdjacentHTML( 'beforeend', this.responseText );
		 window.scrollTo(0,document.body.scrollHeight);	  
			  
               
           }
                           count=1;
   document.getElementById("loading").innerHTML = "";
               }

        };
        xmlhttp.open("GET", "former.php?q=" + str, true);
        xmlhttp.send();
    
}

function callme(){
id = setInterval(messenger, 3000);

}


$(document).ready(function(){
    $("#top").click(function(){
        $("#panel").slideToggle("slow");
    });
});



function del() {
   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("top").click();
                document.getElementById("txtmessage").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "delete_chat.php", true);
        xmlhttp.send();
    
}




function fullchat() {
   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("top").click();
                document.getElementById("txtmessage").innerHTML = this.responseText;
               window.scrollTo(0,document.body.scrollHeight);	 
              
                count=0;
               
                    


            }
        };
        xmlhttp.open("GET", "full_chat.php", true);
        xmlhttp.send();
    
}




</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>simpleFB</title>
<style>
#top
{
color:white; 
background-color:#0000e6;
padding-left:10px;
padding-bottom:5px;
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

padding: 12px 12px;
border: 2px solid #0000e6;
background-color:#4d4dff;
color:white;
border-radius:50%;
}
.righ{
	
	background-color:#0000e6;
	color:white;
	padding:4px 4px;
	border:1px solid #000080;
	border-radius:4px;
    width:40%;	
}
.lef{
	background-color:#f2f2f2;
	padding:4px 4px;
	border:1px solid #000080;
	border-radius:4px;
    width:40%;
	
}
.marg{
	margin:12px;
}
.button1{
width:60%;
padding: 12px 20px;
border: 2px solid #0000e6;
background-color:#4d4dff;
color:white;

}
#rig
{
text-align:right;
float:right;
padding-right:10px;
}
#panel{
	

    display: none;
    background-color: #0000e6;
   
}
.optio{
	color:white;
	margin:10px;
	border-bottom:1px solid white;
	padding:10px 2px;
}

a{
text-decoration:none;
}
</style>
</head>
<body>

<div style="position:fixed; top:0px; width:100%; z-index: 255;">
<h3 id="top">

<?php
echo $_SESSION["temp"];
?>
<div id="rig">&#9776;</div>
</h3>
<div id="panel">
<div class="optio" onclick="clicker();">Attach Photo</div>
<div class="optio" onclick="clickervid();">Attach video</div>
<div class="optio" onclick="fullchat();">See Full Chat</div>
<a href="email.php"><div class="optio">Mail Full Chat</div></a>
<div class="optio" onclick="del();">Delete Chat</div>
<div class="optio" onclick="logoutfb();" >Log Out</div>

</div>
</div>
<center>
<div style="position:fixed; bottom:4px; width:90%; margin: 2px 0; z-index: 255;">
<input class="input1" id="messa" type="text" name="username" placeholder="Type a Message......." autocomplete="off">
</div>
<div style="position:fixed; bottom:4px; right:8px; width:10%; margin: 2px 0; z-index: 255;">
<button onclick="assigner()" class="button">
&#9654;
</button>
</div>
<br><br><br>
<div id="loading"><br><br><br><br><br><center><button onclick="assigner()" class="button1" id="pls">
loading...
</button></center></div>
<div id="txtmessage"></div>







<br><br><br>
</center>
<div style="display:none;">
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit" id="submitter">

<label for="file"><span>Filename:</span></label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" id="submittervid" />


</div>
</body>
<script>

document.getElementById("pls").click();
function clicker()
{
document.getElementById("fileToUpload").click();
id1 = setInterval(uploader, 500);
}
function uploader(){
if(document.getElementById("fileToUpload").value!="")
{
 document.getElementById("top").click();
document.getElementById("submitter").click();
 clearInterval(id1);
document.getElementById("fileToUpload").value="";
}
}
function clickervid()
{
document.getElementById("file").click();
id2 = setInterval(uploadervid, 500);
}
function uploadervid(){
if(document.getElementById("file").value!="")
{
 document.getElementById("top").click();
document.getElementById("submittervid").click();
 clearInterval(id2);
  
document.getElementById("file").value="";

}
}
  $(document).ready(function(){
        $('#fileToUpload').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('fileToUpload', file);
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success: function(response){
                    $('.result').html(response.html)
                }
            });
        });
    });
  $(document).ready(function(){
        $('#file').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('file', file);
            $.ajax({
                url : "uploadvid.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success: function(response){
                    $('.result').html(response.html)
                }
            });
        });
    });




</script>
</html>