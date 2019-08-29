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
	<meta charset="utf-8"/>
	<title>AskAnything</title>
	<link rel="stylesheet" href="../css/Askquestion.css">
	<link rel="shortcut icon" href="../visual/askanythingicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>

<body>
	<nav>
		<!--icon--><img src="../visual/png/askanythinglogo.png" style="width:150px;height:60px">
		<!--icon-->
		<ul>
			<li>
        <form action="../php/search.php" method="post">
          <input class="Search" type="search" name="search" placeholder="Search...">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</li>
			<li><a href="../php/afterlogin.php">Dashboad</a>
			</li>
			<li><a href="../php/group.php">Find Group</a>
			</li>
			<li><a href="#">Test Your Limit</a>
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
             			</ul>
             		</li>
          			<li><a href="">Physics</a>
          				<ul>
              				<li><a href="">Practice</a></li>
                			<li><a href="../php/exam.php?subject=physics">Test</a></li>
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
	<br>
	<h2>Ask Your Question</h2>

	<form class="question" action="../php/storequestion.php" method="get">
		
		<?php
		$uid = $_SESSION[ 'usernID' ];

		$sql = "select * from groupmember,groups where MemID='$uid' and GID=ID";


		$result = mysqli_query( $con, $sql );
		$num = mysqli_num_rows( $result );
		//echo $rowcount;
		if ( $num == 0 ) {
			echo "You need to join a group first.";
		} else {
			echo "<p>Choose Group</p>";
			?>
		<select name='group'>
			<?php
			while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
				$selectid = $row[ 'GID' ];

				$groupname = $row[ 'Name' ];
				//echo $selectid;
				//echo $groupname;
				echo "<option value='$selectid'>$groupname</option>";
			}
			echo "</select><br>";

			echo "<p>Ask a question. (Highest 500 characters)</p>
			<textarea rows='10' cols='50' name='question' ></textarea>
		<br>
		<input type='submit' value='Submit'>";

			}
			?>
	</form>
</body>
</html>