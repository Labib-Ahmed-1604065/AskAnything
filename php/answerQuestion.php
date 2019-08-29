<?php
session_start();
$QID = $_GET[ 'QID' ];
$Question = "question_" . $QID;
?>



<html>
<head>
	<title>
		Answer
	</title>
	<link rel="stylesheet" href="../css/answerQuestion.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico"/>

</head>

<body>

	<h3 align="center">Provide your answers:</h3>
	<form class="ansQ" action="../php/ansProcess.php" method='get'>
		<textarea name="answer" rows="10" cols="80" name="answer" placeholder="Type your answer here">
</textarea>
		<br>

		<?php
		echo "<input type='hidden' name='QID' value=$QID>";
		?>
		<input type="submit" name="Submit">
	</form>

</body>
</html>