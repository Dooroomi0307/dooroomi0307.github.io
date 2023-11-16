<?php function sortbyScore($a, $b){
	return $b['score'] - $a['score'];
}

function newGame(){	//sets each user's score to 0 in the text file
	foreach(file(".././login/userdata.txt") as $line){	//get user data into array
		$arr = explode(",",$line);
		$initialStr = implode(",",$arr);	//saves inital user array
		$arr[2] = 0;
		$getNewStr = implode(",",$arr);	//saves array with new scores
		$replaceStr = $getNewStr."\n";
		$file_contents = file_get_contents(".././login/userdata.txt"); //obtains lines from txt file
		$file_contents = str_replace($initialStr, $replaceStr, $file_contents);	//replace correct lines in txt file
		file_put_contents(".././login/userdata.txt", $file_contents);
	}
	header('Location: jeopardy.php');	//redirect back to jeopardy board
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Leaderboard</title>
        <link href="../Styles/leaderboard-style.css" rel="stylesheet">
    </head>
    <body>
	 <table id="leaderboard">
           <caption>Leaderboard</caption>
          <tr>
            <th>Name</th>
            <th>Winnings</th>
          </tr>
      
	  <?php
		$userData = array();
	   $i = 0;
	   foreach(file(".././login/userdata.txt") as $line){
			$arr = explode(",", $line);	//get each line of the text file and turn into array
			$userData[$arr[0]] = array('name' => $arr[0], 'score' => $arr[2]);	//turn each line into associative array
			usort($userData, "sortbyScore");	//sort from highest to lowest score
	   }
	   foreach($userData as $val){?>
          <tr>
            <td><?= $val['name'];	//print name?>	
			</td>
            <td><?= $val['score'];	//print score?></td>
          </tr>
	   <?php 
	   $i++;
		if ($i == 10){	//only print top 10 users
				break;
			}
	   } ?>
		 </table>

        <div id="new-game">
            <form method="post">
                <input type="submit" value="New Game" name="restart" id="return-board">
            </form>
           </div>
		<?php
			 if(isset($_POST['restart'])) { 
				newGame();
				
			} ?>
		 
    </body>
</html>