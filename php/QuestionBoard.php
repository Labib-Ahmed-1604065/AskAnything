<?php
session_start();
include_once '../php/connection.php';
?>

<html>

<head>
	<title>Question Dashboard</title>
</head>



<body>
	<?php
	$sql = "SELECT * FROM `question`";

	$query = mysqli_query( $con, $sql );

	$num = mysqli_num_rows( $query );

	if ( $num > 0 ) {
		while ( $row = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
			$QID = $row[ 'question_id' ];
			$question = $row[ 'question_text' ];
			echo "<a href='../php/questionDetails.php?QID=$QID'>$question</a><br>";
		}
	}

	?>


</body>
</html>