<?php
$QID = $_GET[ 'QID' ];
include_once( '../php/connection.php' );

$sql = "DELETE FROM `question` WHERE question_id='$QID'";
if(mysqli_query( $con, $sql ))
{
	$tablename="question_".$QID;
	$sql = "DROP TABLE $tablename";
	if(mysqli_query( $con, $sql ))
	{
		$sql = "DELETE FROM `upvotestatus` WHERE QueID='$QID'";
		if(mysqli_query( $con, $sql ))
		{
			header('Location:../php/myQuestion.php');
		}
		else
		{
			echo "problem in upvote";
		}
	}
	else
	{
		echo "problem in question table";
	}
}
else
{
	echo "problem in question ID not found.";
}


?>