<!--+++ Use this file for page connection & data processing +++-->
<?php 
session_start();
foreach(file(".././login/userdata.txt") as $line){	//get user data into array
	$arr = explode(",",$line);
	if($arr[0] == $_SESSION['Username']){	//gets the name of the user and stores it
		break;
	}
}

function updateScore($arr, $score){
	$initialStr = implode(",",$arr); //saves inital user array
	$arr[2] = $score;	//sets new score
	$getNewStr = implode(",",$arr);	
	$replaceStr = $getNewStr;
	$file_contents = file_get_contents(".././login/userdata.txt");	//obtains lines from txt file
	$file_contents = str_replace($initialStr, $replaceStr, $file_contents);	//replace correct lines in txt file
	file_put_contents(".././login/userdata.txt", $file_contents);
	
} ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Jeopardy</title>
        <link rel="stylesheet" href="../Styles/result-css.css">
    </head>
    <body>
        <?php
          //might delete  session_start();
            // Assign variables for displaying question page components
            $correct_answer = $_POST['correct_answer'] ?? '';
            $selected_answer = $_POST['choices'] ?? '';
            $point = $_POST['point'] ?? '';
            $c_a = trim($correct_answer);
            $s_a = trim($selected_answer);
            ?>
            <div id="container">
                <div id="result">
                    <?php 
                        echo $point;
                        print "<br><br>";
                        print "Correct Answer<br>$c_a<br><br>";
                        print "Your Answer<br>$s_a<br><br>";
                        if($c_a == $s_a){
                            print "CORRECT";
                            $_SESSION['score'] += $point;
                            $_SESSION['attempt'] += 1;
							updateScore($arr, $_SESSION['score']);
                        }else{
                            print "INCORRECT";
                            $_SESSION['attempt'] += 1;
                        }
                    ?>
                </div>
				
				<div>
                    <a id="return" href="./jeopardy.php">Return</a>
                </div>
            </div>

          
    </body>
</html>
