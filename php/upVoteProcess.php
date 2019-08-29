<?php
session_start();


if(isset($_POST['QID'])&&isset($_POST['UID'])&&isset($_POST['AnsID'])&&isset($_POST['upvote'])){
$QID=$_POST['QID'];
$UID=$_POST['UID'];
$AnsID=$_POST['AnsID'];
$upvote=$_POST['upvote'];
include('../php/connection.php');
$sql="UPDATE question_$QID SET `upvotenum`='$upvote' WHERE AnsID=$AnsID";
mysqli_query($con,$sql);

$sql2="SELECT * FROM `upvotestatus` WHERE QueID='$QID' and AnsID='$AnsID' and UserID='$UID'";
$query=mysqli_query($con,$sql2);

$num=mysqli_num_rows($query);
if($num==1)
{
	$sql3="DELETE FROM `upvotestatus` WHERE QueID='$QID' and AnsID='$AnsID' and UserID='$UID'";
	$query2=mysqli_query($con,$sql3);
}
else if($num==0)
{
	$sql3="INSERT INTO `upvotestatus` VALUES ('$QID','$AnsID','$UID','Upvoted')";
	$query2=mysqli_query($con,$sql3);
}
}
?>