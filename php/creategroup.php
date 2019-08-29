<?php
 session_start();
 if(!isset($_SESSION['usernID']))
{
	header('Location: LoginSignup.php');
}
?>
<html>
<head>
	<title>AskAnything</title>
	<!--style-->
	<link rel="stylesheet" href="../css/creategroup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico" />
	<!--style-->
</head>

<body>
	<form action="../php/aftergroup.php" method='post'>
		<label>Group Name:</label><br>
		<input type="text" name="groupname" placeholder="Enter group name"><br>
		<label>Category:</label>
		<select name="Category">
			<option value="IT">IT</option>
			<option value="Sci-Fi">Sci-Fi</option>
			<option value="Science">Science</option>
			<option value="AI">AI</option>
			<option value="Literature">Literature</option>
			<option value="CSE">CSE</option>
			<option value="Animation">Animation</option>
			<option value="Mathematics">Mathematics</option>
		</select><br>
		
		
		<input type="submit" value="Create Group">
	</form>
</body>
</html>
