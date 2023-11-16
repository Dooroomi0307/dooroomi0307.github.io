<!--+++ Use this file for page connection & data processing +++-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Styles/style.css">
        <title>Jeopardy</title>
    </head>
    <body>
        <?php
            include ("./q_query.php");
            session_start();
            global $score;
            //$_SESSION for recording score, attempt
            //***Please declare User ID here & display it on line #87***
            if (!isset($_SESSION['score'])) {
                $_SESSION['score'] = 0;
            }
            if (!isset($_SESSION['attempt'])) {
                $_SESSION['attempt'] = 0;
            }
			if($_SESSION['attempt'] >= 30){
				$_SESSION['score'] = 0;
				$_SESSION['attempt'] = 0;
				header('Location: leaderboard_final.php');
			}
			
			$score = $_SESSION['score'];

            //***If attempt exceed 30 (total # of tiles), lead player to leaderboard 
        ?>

        <div id="header">
            <nav>
                <h2 id="user-name"> <?= $_SESSION['Username']; ?> </h2>
                <img id="jeopardy-logo" src="../Resources/Jeopardy_logo.png" alt="alt">
                <div class="leaderboard-logout">
                    <a id="leaderboard" href="leaderboard.php">Leaderboard</a>
                    <form action=".././Login/logout.php" id="log-out-form">
                    <button type="submit" id="log-out">Log Out</button>
                    </form>
                </div>
                
            </nav>
        </div>
        <table id="jeopardy-table">
            <tr class="Category">
                <td>Geography</td>
                <td>Sports</td>
                <td>Animals</td>
                <td>Art</td>
                <td>Capitals</td>
                <td>Movies</td>
            </tr>
            <tr>
                <td id="value"><a href="./q_query.php?c=Geography&p=200">$200</a></td>
                <td id="value"><a href="./q_query.php?c=Sports&p=200">$200</a></td>
                <td id="value"><a href="./q_query.php?c=Animals&p=200">$200</a></td>
                <td id="value"><a href="./q_query.php?c=Art&p=200">$200</a></td>
                <td id="value"><a href="./q_query.php?c=Capitals&p=200">$200</a></td>
                <td id="value"><a href="./q_query.php?c=Movies&p=200">$200</a></td>
            </tr>
            <tr>
                <td id="value"><a href="./q_query.php?c=Geography&p=400">$400</a></td>
                <td id="value"><a href="./q_query.php?c=Sports&p=400">$400</a></td>
                <td id="value"><a href="./q_query.php?c=Animals&p=400">$400</a></td>
                <td id="value"><a href="./q_query.php?c=Art&p=400">$400</a></td>
                <td id="value"><a href="./q_query.php?c=Capitals&p=400">$400</a></td>
                <td id="value"><a href="./q_query.php?c=Movies&p=400">$400</a></td>
            </tr>
            <tr>
                <td id="value"><a href="./q_query.php?c=Geography&p=600">$600</a></td>
                <td id="value"><a href="./q_query.php?c=Sports&p=600">$600</a></td>
                <td id="value"><a href="./q_query.php?c=Animals&p=600">600</a></td>
                <td id="value"><a href="./q_query.php?c=Art&p=600">$600</a></td>
                <td id="value"><a href="./q_query.php?c=Capitals&p=600">$600</a></td>
                <td id="value"><a href="./q_query.php?c=Movies&p=600">$600</a></td>
            </tr>
            <tr>
                <td id="value"><a href="./q_query.php?c=Geography&p=800">$800</a></td>
                <td id="value"><a href="./q_query.php?c=Sports&p=800">$800</a></td>
                <td id="value"><a href="./q_query.php?c=Animals&p=800">$800</a></td>
                <td id="value"><a href="./q_query.php?c=Art&p=800">$800</a></td>
                <td id="value"><a href="./q_query.php?c=Capitals&p=800">$800</a></td>
                <td id="value"><a href="./q_query.php?c=Movies&p=800">$800</a></td>
            </tr>
            <tr>
                <td id="value"><a href="./q_query.php?c=Geography&p=1000">$1000</a></td>
                <td id="value"><a href="./q_query.php?c=Sports&p=1000">$1000</a></td>
                <td id="value"><a href="./q_query.php?c=Animals&p=1000">$1000</a></td>
                <td id="value"><a href="./q_query.php?c=Art&p=1000">$1000</a></td>
                <td id="value"><a href="./q_query.php?c=Capitals&p=1000">$1000</a></td>
                <td id="value"><a href="./q_query.php?c=Movies&p=1000">$1000</a></td>
            </tr>
        </table>

        <div id="footer">
            <ul>
                <li>Score: <?= $score?></li>
            </ul>
        </div>
    </body>
</html>
