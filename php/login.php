<?php
session_start();
$username =$_POST['Name'];
$username =str_replace("\\","\\\\",$username);
$username =str_replace("'","\'",$username);
$password =$_POST['Password'];
$hash = hash('sha512', $password );
if ( !empty( $username ) && !empty( $password ) ) {
	$user = 'root';
	$pass = '';
	$db = 'ourcuet_sharif';

	$con = new mysqli( 'localhost', $user, $pass, $db )or die( "Try again" );
	$statement = "select * from login where Username='$username' and Password='$hash'";
	$result = $con->query( $statement );
	//echo "$result";
	$count = mysqli_num_rows( $result );
	if ( $count!=0 ) {
		while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
			$loggedinuser=$row['User_ID'];
			$_SESSION["username"]=$row['Username'];
			$_SESSION["usernID"]=$loggedinuser;
			
		}
		//echo "stored";
		header( 'Location: ../php/afterlogin.php' );
	} else {
		echo "username or password is incorrect";
	}
	//$conn->close();
	//}
} else {
	echo "Name and Password should not be empty";
	die( ". give input please" );
}






?>