<?php
session_start();
$username = $_POST[ 'Name' ];
$email = $_POST[ 'Email' ];
$password = $_POST[ 'Password' ];
$mpass = $_POST[ 'MatchPassword' ];


if ( !empty( $username ) && !empty( $password ) && !empty( $mpass ) ) 
{
	if ( $password == $mpass ) 
	{
		$hash = hash('sha512', $password );
		$user = 'root';
		$pass = '';
		$db = 'ourcuet_sharif';
	
		$con = new mysqli( 'localhost', $user, $pass, $db )or die( "Try again" );
		$statement = "INSERT INTO login (Username, Password, email) values ('$username', '$hash', '$email')";
		if ( $con->query( $statement ) ) 
		{
			header( 'Location: ../php/LoginSignup.php' );
		}
		else 
		{
		echo "Error: " . $statement . "<br>" . $con->error;
		}
	}
} 
else 
{
	echo "Name and Password should not be empty";
	die( ". give input please" );
}






?>