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
        <form action="search.php" method="post">
          <input class="Search" type="search" placeholder="Search..." name="search">
          <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </li>
			<li><a href="../php/afterlogin.php">Dashboard</a></li>
			<li><a href="../php/group.php">Groups</a></li>
			<li><a href="../php/askquestion.php">Ask a Question</a></li>
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
						<a href="../php/logout.php">Sign Out</a>
					</li>

				</ul>
			</li>
			
		</ul>
	</nav>
	</body>
</html>
