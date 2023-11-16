<?php function sortbyScore($a, $b){
	return $b['score'] - $a['score'];
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

        <div id="return-leaderboard">
            <form action="./jeopardy.php">
                <input type="submit" value="Return" id="return-board">
            </form>
           </div>
    </body>
</html>