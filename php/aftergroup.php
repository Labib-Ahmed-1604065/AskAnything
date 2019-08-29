<?php
//sanitaization done
include_once( '../php/connection.php' );
session_start();
$group = filter_input( INPUT_POST, 'groupname' );
$group=str_replace("\\","\\\\",$group);
$group=str_replace("'","\'",$group);
$cat = $_POST[ 'Category' ];
$cat=str_replace("\\","\\\\",$cat);
$cat=str_replace("'","\'",$cat);
$statement = "SELECT * from groups where name='$group' and category='$cat'";
$query = mysqli_query( $con, $statement );
$count = mysqli_num_rows( $query );
if ( $count == 0 ) {
	$statement = "INSERT INTO `groups`(`Name`, `Category`, `Member`) VALUES ('$group','$cat',1);";
	//echo $statement;
	$update = mysqli_query( $con, $statement );
	$creatorID = $_SESSION[ "usernID" ];
	$statement = "SELECT * from groups where name='$group' and category='$cat'";
	$query = mysqli_query( $con, $statement );

	if ( $row = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
		$GID = $row[ 'ID' ];
		$statement = "INSERT INTO `groupmember`(`GID`, `MemID`, `position`) VALUES ('$GID','$creatorID','Creator')";
		mysqli_query( $con, $statement );


		header( "Location: ../php/afterlogin.php" );
	}
} else {
	echo "Such a group already exists. Click <a href='../php/creategroup.php>here</a> to go back.'";
}
?>