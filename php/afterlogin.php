<?php
session_start();
if(!isset($_SESSION['usernID']))
{
	header('Location: LoginSignup.php');
}
include_once '../php/connection.php';
?>
<html>
<head>
	<title>AskAnything</title>
	<link rel="stylesheet" href="../css/AfterLogin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico"/>
	<link rel="stylesheet" href="../css/upvote.css">
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/upDB.js"></script>
</head>

<body>
	<nav>
		<!--icon--><img src="../visual/png/askanythinglogo.png" style="width:150px;height:60px" alt="askanything icon">
		<!--icon-->
		<ul>
			<li>
        <form action="../php/search.php" method="post">
          <input class="Search" type="search" name="search" placeholder="Search...">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</li>
			<li><a href="../php/profile.php">Profile</a>
			</li>
			<li><a href="../php/group.php">Groups</a>
			</li>
			<li><a href="../php/askquestion.php">Ask a Question</a>
			</li>
			<li><a href="#">Test You Limit</a>
				<ul>
					<li><a href="">Math</a>
						<ul>
							<li><a href="">Practice</a>
							</li>
							<li><a href="../php/exam.php?subject=math">Test</a>
							</li>
						</ul>
					</li>
					<li><a href="">English</a>
						<ul>
							<li><a href="">Practice</a>
							</li>
							<li><a href="../php/exam.php?subject=english">Test</a>
							</li>
						</ul>
					</li>
					<li><a href="">Physics</a>
						<ul>
							<li><a href="">Practice</a>
							</li>
							<li><a href="../php/exam.php?subject=physics">Test</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="login"><a href="#"><img src="../visual/svg/round-account-button-with-user-inside.svg" alt="Login/Signup" style="width:50px;height:50px;margin-left: 50px; margin-top:-10px;"></a>
				<ul id="pro">
					<li>
						<a href="../php/logout.php">Sign Out</a>
					</li>

				</ul>
			</li>
		</ul>
	</nav>
	<main>
		<h1 id="qdash" align="center">Question Dashboard</h1>
		<?php
		$uid = $_SESSION[ 'usernID' ];
		$sql = "select * from groupmember,question WHERE MemID=$uid and question_group_id=GID order by question_id desc";

		$query = mysqli_query( $con, $sql );

		$num = mysqli_num_rows( $query );
		if ( $num > 0 ) {
			while ( $row = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {

				$QID = $row[ 'question_id' ];
				$question = $row[ 'question_text' ];



				echo "<div class='question'>";
				echo "<a href='../php/questionDetails.php?QID=$QID' class='ques'>$question</a><br>";
				echo "</div><br><br><br>";
			}
		}
		?>
		<!--<div class=\"answerbox\">
				<div class=\"answerinfo\"> <span><img src=\"photo.jpg\" alt=\"the person who answered the question\"></span> <span>name of the person who answered the question</span> </div>
				<div class=\"giveanswer\">
					<div class=\"voteanswer\"> <img src=\"voteup.png\" alt=\"voteup\"> <span class=\"avup\">123</span> <img src=\"votedown.png\" alt=\"votedown\"> <span class=\"avdown\">123</span> </div>
					<div class=\"answer\"> the quick brown fox jumped over the lazy dog </div>
				</div>
			</div>-->

	</main>
	<script src="../js/afterlogin.js"></script>
</body>
</html>