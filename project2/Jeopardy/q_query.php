<?php
    //***DO NOT MODIFY THIS FILE***
    
    //get contents from questions.txt
    $questionPool = file_get_contents("./questions.txt");
    //separate each question that is separated by \n and save them in array
    $questions = explode("\n", $questionPool);

    foreach ($questions as $question) {
        //separate single question into $q array
        $q = explode(";", $question);
        
        if(isset($_GET['c']) && isset($_GET['p'])){
            
            if ($q[0] == $_GET['c'] && $q[1] == $_GET['p']){
                $category = $q[0];
                $point = $q[1];
                $que = $q[2];
                $c1 = $q[3];
                $c2 = $q[4];
                $c3 = $q[5];
                $c4 = $q[6];
                $ca = $q[7];
              
                $url = "question.php?category=$category&point=$point&que=$que&c1=$c1&c2=$c2&c3=$c3&c4=$c4&ca=$ca";
                header("Location: $url"); 
                exit();
            }
        }
    }
?>