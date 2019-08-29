<?php

include_once('../php/connection.php');
//include_once('nav.php');
session_start();
?>
<html>
<head>
<title>Result</title>
	<link rel="stylesheet" href="../css/Result1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico"/>
</head>

<body>
	<nav>
		<!--icon-->
		<img src="../visual/png/askanythinglogo.png" style="width:150px;height:60px" alt="askanything icon">
		<!--icon-->
		<ul>
			<li>
				<form action="#">
					<input class="Search" type="search" placeholder="Search...">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</li>
			<li><a href="../php/profile.php">Profile</a>
			</li>
			<li><a href="../php/group.php">Groups</a>
			</li>
			<li><a href="../php/askquestion.php">Write a post</a>
			</li>
			<li><a href="#">Test You Limit</a>
        <ul>
          <li><a href="">Math</a>
            <ul>
              <li><a href="">Practice</a></li>
                <li><a href="../php/exam.php?subject=math">Test</a></li>
              </ul>
          </li>
          <li><a href="">English</a>
          <ul>
              <li><a href="">Practice</a></li>
                <li><a href="../php/exam.php?subject=english">Test</a></li>
              </ul></li>
          <li><a href="">Physics</a>
          <ul>
              <li><a href="">Practice</a></li>
                <li><a href="../php/exam.php?subject=physics">Test</a></li>
              </ul></li>
        </ul>
      </li>
			<li class="login"><a href="#"><img src="../visual/svg/round-account-button-with-user-inside.svg" alt="Login/Signup" style="width:50px;height:50px;margin-left: 50px; margin-top:-10px;"></a> 
			<ul id="pro">
					<li>
						<a href="logout.php">Sign Out</a>
					</li>

					</ul>
			</li>
		</ul>
	</nav>

<h1>Result Sheet</h1>
<table id="test" border="5px;">
		<tr><th>Question No.</th><th>Question</th><th>Right Answer</th><th>Your Answer</th></tr>

<?php
$NumOfQuestion=5;
$sum=0;

for($i=0;$i<$NumOfQuestion;$i++){
	$QID= $_GET['que'.($i+1)];
	$tickNo=$_GET['ticked'.($i+1)];
	
$statement="SELECT * FROM `questionnaire` where QID=$QID";

$query=mysqli_query($con,$statement);
$count = mysqli_num_rows( $query );
	if ( $count!=0 ) {
		while ( $row = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
			$question=$row['question'];
			$right=$row['correct'];
			$ticked=$row['op_'.$tickNo];
		}
	}


if($ticked==$right)
$sum+=1;
else
$sum+=0;


echo "<tr><td>";
echo $i+1;
echo "</td><td>";
echo $question;
echo "</td><td>";
echo $right;
echo "</td><td>";
echo $ticked;
echo "</td>";

}
echo "</table><h3>Your mark is ";
echo $sum;
echo " out of $NumOfQuestion</h3>";


?>
</body>
</html>