<?php
session_start();
?>

<html>
<head>
<title>LOGIN or SIGNUP</title>
<link rel="stylesheet" href="../css/Loginsignup.css">
<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico" />
</head>
<body>
<div class="login-signup-with-buttons"> 
	<a href="#" onclick="showLog()" id="logButton">Login</a> 
	<a href="#" onclick="showSign()" id="signButton">Signup</a> 
	<br>
  <br>
  <div class="wholething">
    <div id="log" class="login">
      <form method="post" action="../php/login.php">
        <b>Username:</b> <br>
        <input type="text" name="Name" placeholder="Enter your username">
        <br>
        <b>Password:</b> <br>
        <input type="password" name="Password" placeholder="Enter your password">
        <br>
        <input type="submit" name="Login">
        <br>
      </form>
    </div>
    <div id="sign" class="signup">
      <form method="post" action="../php/signup.php">
        <b>Name:</b> <br>
        <input type="text" name="Name" placeholder="enter your name">
        <br>
        <b>E-mail:</b> <br>
        <input type="email" name="Email" placeholder="enter your email">
        <br>
        <b>Password:</b> <br>
        <input type="password" name="Password" placeholder="enter your password">
        <br>
        <b>Retype password:</b> <br>
        <input type="password" name="MatchPassword" placeholder="enter your password again">
        <br>
        <input type="submit" name="Signup">
        <br>
      </form>
    </div>
  </div>
  <script src="../js/loginsignup.js"></script> 
</div>
</body>
</html>