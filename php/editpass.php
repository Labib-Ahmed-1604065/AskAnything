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
	$cpass=$_POST['cpass'];
	

	$npass=$_POST['npass'];
	$rnpass=$_POST['rnpass'];
	$User_ID=$_SESSION["usernID"];
	//echo $User_ID;
	if($cpass==""||$npass==""||$rnpass=="")
	{
		if($cpass=="")
		{
			echo "You need to enter the current password. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
		}
		
		elseif($npass=="")
		{
			echo "You must give a new password to change your current password. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
		}
		else
		{
			echo "You must retype your new password to change your current password. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
		}
	}

	else
	{
		

		$checkCurrentPassword="SELECT * FROM `login` WHERE User_ID=$User_ID";
		$result=mysqli_query($con,$checkCurrentPassword);
		$num=mysqli_num_rows($result);
		//echo $num;
		if($num>0)
		{
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$hashcpass=md5($cpass);
			if($row['Password']==$hashcpass)
			{
				if($npass==$rnpass)
				{
					
					$hashnpass=md5($npass);
					$sql="UPDATE `login` SET `Password`='$hashnpass' WHERE User_ID=$User_ID";
					echo $sql;
					if(mysqli_query($con,$sql))
					{
						header('Location:../php/profile.php');
					}
					else
					{
						echo "Something went worng. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
					}
				}
				else
				{
					echo "New password and retyped new password did not match. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
				}
			}
			else
			{
				echo "You have entered a wrong current password. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
			}
		}
		else
		{
			echo "Something went worng. Click <a href='../php/profile.php'>here </a> to go back to previous page.";
		}
	}
	
?>
<body>
</body>
</html>