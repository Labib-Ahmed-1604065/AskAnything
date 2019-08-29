<?php
session_start();
if(!isset($_SESSION['usernID']))
{
	header('Location: LoginSignup.php');
}
?>
<html>
<head>
	<title>AskAnything</title>
	<link rel="stylesheet" href="../css/Profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="shortcut icon" href="../visual/icon/askanythingicon.ico" />
</head>
<body>
	<nav>
    <!--icon--><img src="../visual/png/askanythinglogo.png" style="width:150px;height:60px"><!--icon-->
		<ul>
      <li>
        <form action="../php/search.php" method="post">
          <input class="Search" type="search" name="search" placeholder="Search...">
          <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </li>
			<li><a href="../php/afterlogin.php">Dashboard</a></li>
			<li><a href="../php/group.php">Groups</a></li>
			<li><a href="../php/askquestion.php">Ask a Question</a></li>
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
      		<li class="login" ><a href="#"><img src="../visual/svg/round-account-button-with-user-inside.svg" alt="Login/Signup" style="border-radius:50%; width:50px;height:50px;margin-left: 50px; margin-top:-10px;"></a>
					<ul id="pro">
					<li>
						<a href="../php/logout.php">Sign Out</a>
					</li>

					</ul>
					</li>
		</ul>
	</nav>
	<br>
	<center><p id="Title">Welcome <?php echo $_SESSION["username"]?></p></center>
	<form id="info">
		<!--dashboard info-->
		
		<img id="proImage" src="../visual/svg/round-account-button-with-user-inside.svg" alt="Profile Photo" height=100px width=100px>
		<br>

		<h4>
			<?php
			echo "Name: ";
			echo $_SESSION["username"];
			?>
		</h4>
	
		<h4>Email: 
		<?php
			include('../php/connection.php');
			$emailsql="SELECT email FROM login WHERE User_ID=".$_SESSION['usernID'];
			$query=mysqli_query($con,$emailsql);
		$count=mysqli_num_rows( $query );
		if($count==0)
		{
			echo "no email provided during signup";
		}
		else
		{
			while($row = mysqli_fetch_array( $query, MYSQLI_ASSOC ))
			{
				echo $row['email'];
			}
		}
		?>
		</h4>
		<br>

		<h4>Groups Joined: 
		<?php 
		include('../php/connection.php');
		$joinQ="SELECT * FROM groupmember,groups WHERE MemID=".$_SESSION['usernID']." and groups.ID=groupmember.GID and groupmember.position='Member'";
		$query=mysqli_query($con,$joinQ);
		$count=mysqli_num_rows( $query );
		$c=$count;
		if($count==0)
		{
			echo "None";
		}
		else
		{
			while($row = mysqli_fetch_array( $query, MYSQLI_ASSOC ))
			{
				$c--;
				echo $row['Name'];
				if($c>0)
				{echo ", ";
				}
			}
		}
		?>
		</h4>
		
		<h4>Groups Created:
		<?php
		$createQ="SELECT * FROM groupmember,groups WHERE MemID=".$_SESSION['usernID']." and groups.ID=groupmember.GID and groupmember.position='Creator'";
		$query=mysqli_query($con,$createQ);
		$count=mysqli_num_rows( $query );
		$c=$count;
		if($count==0)
		{
			echo "None";
		}
		else
		{
			while($row = mysqli_fetch_array( $query, MYSQLI_ASSOC ))
			{
				$c--;
				echo $row['Name'];
				if($c>0)
				{echo ", ";
				}
			}
		}
		?>
		
		
		
		</h4>
		<br>
		<br>
		<a href="../php/myQuestion.php">My Questions</a>
		<a href="#" onclick="edit()">Edit username or email</a>
		<a href="#" onclick="change()">Change Password</a>

		</form>
		<div id="popUp">
			<form id="edit" method="post" action="../php/edit.php">
				<p>Name</p>
			<input type="text" name="name" placeholder="new name" value="">
			<p>Email</p>
			<input type="text" name="email" placeholder="new email" value="">
			<br>
			<br>
			
			<ul>
				<li><a id="confirm" onclick="done(0)" href="#">Confirm</a></li>
				<li><a id="cancel" href="#" onclick="done(2)" >Cancel</a></li>	
			</ul>
			</form>
		</div>

		<div id="popUp1">
				<form id="edit1" method="post" action="../php/editpass.php">
					<p>Current Password</p>
					<input type="password" name="cpass" placeholder="current password" value="">
					<p>Enter Password</p>
					<input type="password" name="npass" placeholder="new password" value="">
					<p>Re-enter Password</p>
					<input type="password" name="rnpass" placeholder="new password" value="">
					<br>
					<br>
					
					<ul>
						<li><a id="confirm" onclick="done(1)" href="#">Confirm</a></li>
						<li><a id="cancel" onclick="done(2)" href="#">Cancel</a></li>	
					</ul>
				</form>
			</div>
		<script >
		
		let popUp=document.getElementById("popUp");
let popUp1=document.getElementById("popUp1");
function edit()
{
    if(popUp.style.display!='block')
    {
        popUp.style.display='block';
    }

    if(popUp1.style.display!='none')
    {
        popUp1.style.display='none';
    }
}

function change()
{
    if(popUp1.style.display!='block')
    {
        popUp1.style.display='block';
    }

    if(popUp.style.display!='none')
    {
        popUp.style.display='none';
    }
}


function done(num)
{
	if(num==0)
	{
		document.getElementById("edit").submit();
	}
	else if(num==1)
	{
		document.getElementById("edit1").submit();
	}
    if(popUp1.style.display!='none')
    {
        popUp1.style.display='none';
    }

    if(popUp.style.display!='none')
    {
        popUp.style.display='none';
    }
}
		</script>
</body>
</html>