<?php

session_start();
include( '../php/connection.php' );

$GID = $_POST[ 'GID' ];

$GID = str_replace( "\\", "\\\\", $GID );
$GID = str_replace( "'", "\'", $GID );

$MID = $_SESSION[ 'usernID' ];

$statement = "SELECT * FROM `groupmember` WHERE GID='$GID' and MemID='$MID'";
//echo $statement;
$result = $con->query( $statement );
$count = mysqli_num_rows( $result );
if ( $count == 0 ) {
	$state = "INSERT INTO `groupmember`(`GID`, `MemID`, `position`) VALUES ('$GID','$MID','Member')";
	//echo $state;
	if ( mysqli_query( $con, $state ) ) {
		//echo "Group joined successfully";
		$update = "UPDATE `groups` SET `Member`=`Member`+1 WHERE ID=$GID";
		//echo $update;
		mysqli_query( $con, $update );

		header( 'Location: ../php/profile.php' );
	}

} else {
	echo "<html>
	<head>
	<title>AskAnything</title>
	<link rel='stylesheet' href='../css/joinGroup.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
	<link rel='shortcut icon' href='../visual/icon/askanythingicon.ico' />
	<head>
	<body>";
	echo "<p class='already' align='center' color='white'>
	You are already in the group.
	<br>Click <a href='../php/group.php'>here</a> to go to previous page.
	<br>Click <a href='../php/profile.php'>here</a> to go to profile.
	</p>";
	echo "</body><html>";
	//echo $MID;
}
?>