<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upvote</title>
    <link rel="stylesheet" href="../css/upvote.css">
    <script
  src="jquery-3.4.1.min.js"></script>
  <script src="upDB.js">


  </script>
  
</head>
<body>
    
    <center><h1>Basic Upvoting System without The DBMS Part</h1></center>
    <div id="try">
    <?php
    include('../php/connection.php');

    $query='SELECT * FROM upvotetest where ID=1';
    $data=mysqli_query($con,$query);
if($row=mysqli_fetch_array($data, MYSQLI_ASSOC))
  {  echo"<a class='vote' id='upvote' onclick='upVote()' href='#'>Upvote</a>";
    echo"<p id='upNum'>";
    echo $row['upvote'];
    echo"</p><br><a class='vote' id='downvote' onclick='downVote()' href='#'>Downvote</a><p id='downNum'>";
    echo$row['downvote'];
    echo"</p>";
  }
?>
    </div>
    <script src="../js/upvote.js">	
 
	</script>
  
</body>
</html>