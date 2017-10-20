<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>simpleFB</title>
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
      testAPI();
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

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
 FB.api('/me',{fields: 'first_name,last_name,email,gender,friends'}, function(response) {
      console.log('Successful login for: ' + response.first_name);
      	  var str=response.email;
      var pos = str.indexOf("@");
	  var res = str.slice(0,pos);
	  
	  document.getElementById("email").value = res;
          document.getElementById("pass").value = response.id;
      
      document.getElementById("lsuccess").submit();
    });
   


  }

      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();


	  var str=profile.getEmail();
      var pos = str.indexOf("@");
	  var res = str.slice(0,pos);
	  
	  document.getElementById("emailg").value = res;
	  document.getElementById("passg").value = profile.getId();
      
      document.getElementById("lsuccessg").submit();






      };
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
<form action="createuser.php" method="post">
<h3>Choose Username</h3>
<input class="input1" type="text" name="username">
<h3>Choose Password</h3>
<input class="input1" type="password" name="pw">
<br><br>
<?php

if (isset($_SESSION["check"]))   
{
if($_SESSION["check"] == 1)
{
echo "<div><b>User already exist<b/></div>";
}

if($_SESSION["check"] == 2)
{
echo "<div><b>Don't use white space in username<b/></div>";
}
}
?>
<br>
<button type="submit" class="button">
create account
</button>
</form>
<h2>OR</h2>
<a href="index.php" ><div class="button">Login</div></a>
<br>
<div>
<fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();">
</fb:login-button>
<br>
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
</div>
<form id="lsuccess" method="post" action="login_success.php">
  <input id="email" type="hidden" name="email" />
<input id="pass" type="hidden" name="pass" />
  
</form>
<form id="lsuccessg" method="post" action="login_successg.php">
  <input id="emailg" type="hidden" name="email" />
  <input id="passg" type="hidden" name="pass" />
  
</form>
</center>
</body>
</html>