<?php
session_start();
?>
<html>
<head>
    <title>
        Question
    </title>
    <link rel="stylesheet" type="text/css" href="../css/Exam.css">
</head>

<body>
    <h3 align="center">Read the queations carefullty and answer them.</h3>
    <h6 align="center">Answer all of them</h6>
    <?php
	$subject=$_GET['subject'];
    include_once( '../php/connection.php' );
    $statement = "SELECT * FROM `questionnaire` where subject='$subject' order by RAND()";
    $data = mysqli_query( $con, $statement );

    $count = mysqli_num_rows( $data );
    $num = 1;
    echo "</p><form method='GET' action='../php/result.php'>";
    if ( $count != 0 )
        while ( $row = mysqli_fetch_array( $data, MYSQLI_ASSOC) ) {
            if($num>5){
                break;
            }
            $QID = $row[ 'QID' ];
            $question = $row[ 'question' ];
            $op_1 = $row[ 'op_1' ];
            $val_1 = $row[ 'val_1' ];
            $op_2 = $row[ 'op_2' ];
            $val_2 = $row[ 'val_2' ];
            $op_3 = $row[ 'op_3' ];
            $val_3 = $row[ 'val_3' ];
            $op_4 = $row[ 'op_4' ];
            $val_4 = $row[ 'val_4' ];

            $right = $row[ 'correct' ];

            echo "<p>";
            echo $num . '. ';
            $queName = 'que' . $num;
            $ansName = 'ans' . $num;
            $tickedName = 'ticked' . $num;
            echo $question;
            echo "</p><input type='radio' name=$tickedName value=1>";
            echo $op_1;
            echo "<br> <input type='radio' name=$tickedName value=2>";
            echo $op_2;
            echo "<br> <input type='radio' name=$tickedName value=3>";
            echo $op_3;
            echo "<br> <input type='radio' name=$tickedName value=4>";
            echo $op_4;
            echo "<input type='hidden' name=$queName value=$QID>";
            echo " <input type='hidden' name=$ansName value=$right>";
            $num++;
        }
    echo "<br><input id='submit' type='submit' value='Submit'><br>";
    echo "</form><br>";
    ?>


</body>
</html>