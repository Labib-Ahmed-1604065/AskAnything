<!DOCTYPE html>
<html>
<head>
	<title>AskAnything</title>
	<!--style-->
	<link rel="stylesheet" href="../css/GroupUseless.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico" />
	<!--style-->

</head>
<body>
<div class="joingroup">	
	<p>Find Group</p>
	<table id="test" border="5px;" align="center">
	
		<tr><th>Group Name</th><th>Category</th><th>Number of Members</th></tr>
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
		
		echo"</td></tr>";
		
		}
	
	
	?>
	</table>
</div>
<br><br>
	<p>You have to log in to join a group. Click <a class="direction" href="../php/LoginSignup.php">here</a> to log in. <br>Click <a class="direction" href="../php/AskAnything.php">here</a> to go home.</p>
</body>
</html>