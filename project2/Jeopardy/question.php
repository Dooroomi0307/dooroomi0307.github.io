<!--***DO NOT MODIFY THIS FILE*** -->
<!DOCTYPE html>
<html>
    <head>
        <title>Jeopardy</title>
        <link rel="stylesheet" href="../Styles/question-css.css">
    </head>
    <body>
        <?php
            global $category, $point, $question, $c_1, $c_2, $c_3, $c_4, $c_a;
            // Assign variables for displaying question page components
            $category = $_GET['category'] ?? '';
            $point = $_GET['point'] ?? '';
            $question = $_GET['que'] ?? '';
            $c_1 = $_GET['c1'] ?? '';
            $c_2 = $_GET['c2'] ?? '';
            $c_3 = $_GET['c3'] ?? '';
            $c_4 = $_GET['c4'] ?? '';
            $c_a = $_GET['ca'] ?? '';
        ?>
        <div id="container">
            <div id="point">
                <h1><?php echo $point; ?></h1>
            </div>
            <div id="q_a">
                <div id="question">
                    <h1><?php echo $question; ?></h1>
                </div>
                <div id="answer">
                    <form method="post" action="./result.php">
                        <input type="radio" id="c1" name="choices" value="<?= $c_1; ?>">
                        <label for="c1"><?php echo $c_1 ?></label><br><br><br>
                        
                        <input type="radio" id="c2" name="choices" value="<?= $c_2; ?>">
                        <label for="c2"><?php echo $c_2 ?></label><br><br><br>
                        
                        <input type="radio" id="c3" name="choices" value="<?= $c_3; ?>">
                        <label for="c3"><?php echo $c_3 ?></label><br><br><br>

                        <input type="radio" id="c4" name="choices" value="<?= $c_4; ?>">
                        <label for="c4"><?php echo $c_4 ?></label><br><br><br>

                        <input type="hidden" name="correct_answer" value="<?= $c_a; ?>">

                        <input type="hidden" name="point" value="<?= $point; ?>">

                        <input type="submit" name="submit" value="Submit" id="submit-button">
                        
                    </form>
            </div>
            </div>
            <div>
                <a id="return" href="./jeopardy.php">Return</a>
            </div>
        </div>
    </body>
</html>
