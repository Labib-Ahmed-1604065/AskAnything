<?php
$username=filter_input(INPUT_POST, 'Name');
$password=filter_input(INPUT_POST, 'Password');

if(!empty($username)&&!empty($password)){
	$host="localhost";
	$dbusename="root";
	$dbpassword="";
	$dbname="ourcuet_labibdb";

	//createing connection
	$conn=new mysqli ($host, $dbusename, $dbpassword, $dbname);
	if(mysql_connect_error)
	{
		die('error connectiong('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$statement="INSERT INTO login (Username, Password) values ('$username', '$password')";
		if ($conn->query($statement)) {
			echo "stored";
		}
		else
		{
			echo "Error: ".$statement ."<br>".$conn->error;
		}
		$conn->close();
	}
}
else{
	echo "Name and Password should not be empty";
	die();
}






?>