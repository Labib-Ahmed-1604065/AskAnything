<?php
session_start();
if(!isset($_SESSION['usernID']))
{
	header('Location: groupuseless.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>AskAnything</title>
	<!--style-->
	<link rel="stylesheet" href="../css/Group.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico" />
	<!--style-->

</head>
<body>
<div class="joingroup">	
	<p>Join Group</p>
	<table id="test" border="5px;">
	
		<tr><th>Group Name</th><th>Category</th><th>Number of Members</th><th></th></tr>
	<?php
		
		include('../php/connection.php');
		
		$query="SELECT * FROM groups";
		$data=mysqli_query($con,$query);
		
		while($row=mysqli_fetch_array($data, MYSQLI_ASSOC))
		{
			$val=$row['ID'];
		echo "<tr><td>";
		echo $row['Name'];
		echo "</td><td>";
		echo $row['Category'];
		echo "</td><td>";
		echo $row['Member'];
		
		echo"</td><td><form action='../php/joinGroup.php' method='post'><input type='hidden' name='GID' value=".$val."  /> <button>JOIN</button></form></td></tr>";
		
		}
	
	
	?>
	</table>
</div>
<br><br>
<a class="cGroup" href="../php/creategroup.php">Create Group</a>

</body>
</html>