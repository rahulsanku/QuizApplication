<?php
    session_start();
    require_once('config.php');
?>
<?php
    
    $_SESSION['delete_quizid'] = $_GET["id"];

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
                <h1>Delete a question</h1>
                <?php
                    $quizid = $_SESSION['delete_quizid'];
                    $sql = "SELECT * FROM quiz_questions, questions WHERE quiz_questions.quiz_id = " . $quizid . " AND quiz_questions.question_id = questions.question_id";
                    echo "<h2>QUIZ ID: " . $quizid . "</h2><br>"; 
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        if($row["quiz_id"] == $quizid) {
                            echo $row["question"];
                            echo "<br>";
                        }
                      }
                    } 
                ?>
                <form action="delete_from_quiz_process.php" method = "post"><br>
                    <select name = "qnum">
                        <?php
                            $sql1 = "SELECT * FROM quiz_questions, questions WHERE quiz_questions.quiz_id = " . $quizid . " AND quiz_questions.question_id = questions.question_id";
                            $result1 = $mysqli->query($sql1);
                            if ($result1->num_rows > 0) {
                              // output data of each row
                              while($row = $result1->fetch_assoc()) {
                                if($row["quiz_id"] == $quizid) {
                                    echo "<option value=". $row['question_id'] . ">" . $row["question"] . "</option>";
                                }
                              }
                            } 
                        ?>
                    </select>
                    <button type="submit" class = "submit">Delete this question from quiz</button>
                </form>
                <form action="modify_quiz.php"><br>
                <button type="submit" class = "submit">Go back to modify quiz</button>
            </form>

                
            </div>

        </div>
    </body>
</html>



