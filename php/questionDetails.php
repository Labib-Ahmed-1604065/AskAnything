<?php
session_start();
include_once '../php/connection.php';
//some editing done along here, up or down
$QID=$_GET['QID'];
$UID=$_SESSION['usernID'];
$sql="SELECT * FROM `question` where question_id=$QID";
//echo $UID;
$query=mysqli_query($con,$sql);

$num=mysqli_num_rows($query);
if($num>0)
{
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	$question=$row['question_text'];
}
?>




<html>

<head>
<!--Some more new code-->
<script
  src="../js/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){

var QID=<?php echo $QID; ?>;
var UID=<?php echo $UID; ?>;
	
$('.VOTE').click(function(){
	
	var ansID = $(this).attr('id');
	ansID = ansID.replace("upstat", "");
  
var upNum=$('#upnum'+ansID).html();

$.post('../php/upVoteProcess.php',{QID: QID, UID: UID, AnsID: ansID, upvote: upNum});
});
});

</script>
<title>
<?php
echo $question;
?>
</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico"/>
	<link rel="stylesheet" href="../css/QuestionDetails.css"/>
</head>


<body>
<?php include_once '../php/nav.php'; ?>
<h1 align="center"><?php echo $question; ?></h1>

<?php
echo "<a href='../php/answerQuestion.php?QID=$QID' id='answerbutton'>Answer</a><br>";
$sql="SELECT * FROM question_$QID order by upvotenum desc";

$query=mysqli_query($con,$sql);

$num=mysqli_num_rows($query);
if($num>0)
{
	
	
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		//some editing here
	$upstat="";
	$ansID=$row['AnsID'];
	$answer=$row['Answer'];
	$upvotenum=$row['upvotenum'];
	//some editing here
	$upnum='upnum'.$ansID;
	
	$upstatus='upstat'.$ansID;
	 
	
	echo "<div class='ans'> <p>$answer</p><p id='$upnum' >$upvotenum</p>"; //some in this line
	
	//totally new code
	$state="SELECT * FROM `upvotestatus` where QueID=$QID and AnsID=$ansID and UserID=$UID";
	
	$SQLQuery=mysqli_query($con,$state);
	$num=mysqli_num_rows($SQLQuery);
	if($num==0){
		$upstat="Upvote";
	}else if($num==1)
	{
		$val=mysqli_fetch_array($SQLQuery,MYSQLI_ASSOC);
		$upstat=$val['upstat'];
		if($val['upstat']=='Upvoted')
		{
			
		}
	}
	echo "<a id='$upstatus' class='VOTE' onclick='upVote($ansID)' href='#'>$upstat</a><br><br> </div>";
	
	
	
	}
}

?>
<!--never before seen code-->
<script>
let VOTE = document.getElementsByClassName("VOTE");
var i;
for (i = 0; i < VOTE.length; i++) {
	if(VOTE[i].innerHTML=="Upvote")
		VOTE[i].style.color = "blue";
	else if(VOTE[i].innerHTML=="Upvoted")
  VOTE[i].style.color = "grey";
}

function upVote(ansID)
{
	
	console.log(ansID);
let upvote=document.getElementById('upstat'+ansID);
let upnum=document.getElementById('upnum'+ansID);

if(upvote.innerHTML=="Upvote")
    {
        upvote.innerHTML="Upvoted";
        upvote.style.color="grey";
        upnum.innerHTML=parseInt(upnum.innerHTML)+1;
    }else  if(upvote.innerHTML=="Upvoted")
    {
        upvote.innerHTML="Upvote";
        upvote.style.color="blue";
        upnum.innerHTML=parseInt(upnum.innerHTML)-1;
    }
}
</script>
</body>


</html>