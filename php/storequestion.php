<?php
session_start();
include_once '../php/connection.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body>
	<?php
	$uid = $_SESSION[ 'usernID' ];
	$group = $_GET[ 'group' ];
	$question = $_GET[ 'question' ];
	$question=str_replace("\\","\\\\",$question);
	$question=str_replace("'","\'",$question);
	
	$sql = "INSERT INTO `question` (`question_user_id`, `question_group_id`, `question_text`) VALUES ('$uid', '$group', '$question');";
	if ( mysqli_query( $con, $sql ) ) {
		//echo "Success";

		$sql = "SELECT * FROM `question` where question_text='$question' ORDER BY `question_id` DESC";
		$result = mysqli_query( $con, $sql );
		$num = mysqli_num_rows( $result );
		if ( $num == 0 ) {
			echo "ERROR OCCURED";
		} else {
			$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
			$QID = $row[ 'question_id' ];


			$sql = "CREATE TABLE question_$QID ( `AnsID` INT NOT NULL AUTO_INCREMENT , `Answer` TEXT NOT NULL , `AnswererID` INT NOT NULL , `upvotenum` INT NOT NULL , PRIMARY KEY (`AnsID`))";
//echo $sql;
			if ( mysqli_query( $con, $sql )) {
				//echo 'if done';
				header( 'Location: ../php/afterlogin.php' );
			} else {
				echo "something went wrong";
			}

		}
	} else
		echo "Failure";

	?>
</body>
</html>