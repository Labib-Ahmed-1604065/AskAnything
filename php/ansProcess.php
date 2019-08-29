<?php
//sanitized
session_start();
include_once '../php/connection.php';
$userID=$_SESSION['usernID'];
$answer=$_GET['answer'];
$answer=str_replace("\\","\\\\",$answer);
$answer=str_replace("'","\'",$answer);
$qNo= $_GET['QID'];
$qNo=str_replace("\\","\\\\",$qNo);
$qNo=str_replace("'","\'",$qNo);
$sql="INSERT Into question_$qNo ( `Answer`, `AnswererID`, `upvotenum`) VALUES ('".$answer."',$userID,0)";
//echo $sql;
if(mysqli_query($con,$sql))

	header( "Location: ../php/questionDetails.php?QID=$qNo" );
else
	echo "Something went wrong. The answer is not saved. Click <a href='../php/answerQuestion.php'>here</a> to go back.";
?>