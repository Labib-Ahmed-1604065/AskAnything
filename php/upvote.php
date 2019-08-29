<?php

if(isset($_POST['upvote'])&&isset($_POST['downvote'])){
$upvote=$_POST['upvote'];
$downvote=$_POST['downvote'];
include('connection.php');
$sql="UPDATE `upvotetest` SET upvote=$upvote, downvote=$downvote WHERE ID=1";

$update=mysqli_query($con,$sql);
if($update==true)
{
    echo 'Yes';
}
else
{
    echo 'No';
}
}
?> 