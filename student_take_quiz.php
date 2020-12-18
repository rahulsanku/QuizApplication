<?php
// Start the session
    session_start();
    require_once('config.php');
    if ( !isset( $_SESSION['student_id'] ) ) {
        header("Location: index.php");
    }

?>

<html>
    <head>
        <title>QUIZ</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Take Quiz</h1>
                <form action="student_take_quiz_process.php" method = "post"><br>
                    <?php
                        $_SESSION['quizid'] = $_GET["id"];
                        $quizid = $_SESSION['quizid'];
                        $sql = "SELECT * FROM quiz_questions, questions WHERE quiz_questions.quiz_id = " . $quizid . " AND quiz_questions.question_id = questions.question_id";
                        echo "<h2>QUIZ ID: " . $quizid . "</h2><br>"; 
                        $result = $mysqli->query($sql);
                          while($row = $result->fetch_assoc()) {
                                echo $row["question"];
                                $question_id = $row["question_id"];
                                echo " <select name = ". $question_id . ">";
                                $sql1 = "SELECT * FROM question_options WHERE question_id = " . $question_id;
                                $result1 = $mysqli->query($sql1);
                                while($row1 = $result1->fetch_assoc()) {
                                    echo "<option value=" . $row1["option_number"] . ">" . $row1["option"] . "</option>";
                                }
                                echo "</select>";
                                echo "<br>";
                          } 
                    ?>
                    <button type='submit' class = 'submit'>Submit</button>
                </form>
            </div>

        </div>
    </body>
</html>
