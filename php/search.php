<?php
session_start();
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/search.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="shortcut icon" href="../visual/icon/askanythingicon.ico"/>
</head>
<?php
include('../php/nav.php');

include( '../php/connection.php' );

$sentence=$_POST['search'];

$puncMarks = array( ',', '.', '?', '!', '"', ':', ';', '`', "'", "/");
$sentence = str_replace( $puncMarks, ' ', $sentence );

//echo $sentence;
$sentence = trim( preg_replace( '/\s+/', ' ', $sentence ) );
$strings = explode( " ", $sentence );

if ( !empty( $sentence ) ) {
	$index = 0;
	$sql = "SELECT * FROM `question` WHERE ";
	foreach ( $strings as $word ) {
		if ( $index != 0 ) {
			$sql = $sql . "or ";
		}
		$sql = $sql . "question_text like '$word %' or question_text like '% $word %' or question_text like '%$word' or question_text like '%$word" . "_'";

		$index++;
	}
	$index=0;
	$sql=$sql."order by ";//desc here...
	foreach ( $strings as $word ) {
		if ( $index != 0 ) {
			$sql = $sql . "+ ";
		}
		$sql = $sql . "CASE WHEN question_text like '$word %' or question_text like '% $word %' or question_text like '%$word' or question_text like '%$word" . "_' THEN 1 ELSE 0 END";

		$index++;
	}
	$sql=$sql." desc";
	//echo $sql;
	$query = mysqli_query( $con, $sql );
	$num = mysqli_num_rows( $query );
	if ( $num > 0 ) {
		while ( $row = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
			//echo $row[ 'question_text' ];
			//echo "\n";
			$QID = $row[ 'question_id' ];
			$question = $row[ 'question_text' ];

			echo "<div class='question'><br>";
			echo "<a href='../php/questionDetails.php?QID=$QID' class='ques'>$question</a><br>";
			echo "</div><br><br>";
		}
	}


}

/*
SELECT   *
FROM     questionnaire
WHERE    question LIKE '%what%'
OR       question LIKE '%does%'
OR       question LIKE '%equal%'
ORDER BY CASE WHEN question LIKE '%what%' THEN 1 ELSE 0 END
       + CASE WHEN question LIKE '%does%' THEN 1 ELSE 0 END
       + CASE WHEN question LIKE '%equal%' THEN 1 ELSE 0 END DESC
*/

?>