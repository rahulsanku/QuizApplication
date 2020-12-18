<?php
    session_start();
    require_once('config.php');


//$quizid = $_SESSION['insert_quizid'];
$_SESSION['insert_question'] = $_POST["question"];
$option_num = $_POST["option_num"];
$_SESSION['option_num'] = $option_num;

//$stmt = $mysqli->prepare("INSERT INTO questions (question, option1, option2, option3, option4, answer) VALUES (?, ?, ?, ?, ?, ?)");
//$stmt->bind_param('ssssss', $question, $option1, $option2, $option3, $option4, $answer);
//$stmt->execute();
//
//$stmt2 = $mysqli->prepare("INSERT INTO quiz_questions (question, quiz_id) VALUES (?, ?)");
//$stmt2->bind_param('ss', $question, $quizid);
//$stmt2->execute();
//
//$mysqli -> close();
//
//header("Location: modify_quiz.php");

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>QUIZ</title>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Insert Options</h1>
                <form action = "insert_process_process.php" method = "post"><br>
                    <?php
                    echo $_SESSION['insert_question'];
                    echo "<br>";
                    $loop = 0;
                    while ($loop < $option_num){
                        $x = $loop+1;
                        echo "<input type='text' placeholder='Option' name=" . $x . "><br>";
                        $loop = $loop+1;
                    }
                    ?>
                    <label>Please state which option is the answer</label><br>
                    <?php
                    $l = 0;
                    while ($l < $option_num) {
                        $x = $l+1;
                        echo "<input type='radio' name='answer' value=" . $x . ">";
                        echo "<label>Option ".$x." </label><br>";
                        $l = $l+1;
                    }
                    
                    
                    ?>
                    

                    
                    <button type='submit' class = 'submit'>Submit</button>
                </form>
            </div>
            <form action="modify_quiz.php"><br>
                <button type="submit" class = "submit">Go back to modify quiz</button>
            </form>

        </div>
    </body>
</html>
    