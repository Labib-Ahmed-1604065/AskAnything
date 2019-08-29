<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<?php
	//echo 's';
	include('../php/connection.php');

$newname=$_POST['name'];
$newname=str_replace("\\","\\\\",$newname);
$newname=str_replace("'","\'",$newname);

$newemail=$_POST['email'];	
$newemail=str_replace("\\","\\\\",$newemail);
$newemail=str_replace("'","\'",$newemail);
	
$User_ID=$_SESSION["usernID"];
	
	if($newname!=""&&$newemail!="")
	{
		$sql="UPDATE `login` SET `Username`='$newname', `email`='$newemail' WHERE User_ID=$User_ID";
		mysqli_query($con, $sql);
		$_SESSION['username']=$newname;
		//echo $sql;
		header('Location:../php/profile.php');
	}
	elseif($newemail==""&&$newname!="")
	{
		$namesql="UPDATE `login` SET `Username`='$newname' WHERE User_ID=$User_ID";
		//echo $sql;
		mysqli_query($con, $namesql);
		$_SESSION['username']=$newname;
		header('Location:../php/profile.php');
	}
	elseif($newname==""&&$newemail!="")
	{
		$emailsql="UPDATE `login` SET `email`='$newemail' WHERE User_ID=$User_ID";
		//echo $sql;
		mysqli_query($con, $emailsql);
		header('Location:../php/profile.php');
	}
	else
	{
		echo "You must enter fill up the name or email fields to change them. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
	}
	
?>
<body>
</body>
</html>