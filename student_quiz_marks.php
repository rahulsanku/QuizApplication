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
        <link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>QUIZ MARKS</title>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Quiz Marks</h1>
                <?php
                    $studentid = $_SESSION['student_id'];
                    $id = 0;
                    $sql = "SELECT * FROM quiz_attempt, quiz WHERE quiz_attempt.student_id = " . $studentid . " AND quiz.quiz_id = quiz_attempt.quiz_id";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<h2>QUIZ NAME: " . $row["name"] . " </h2><br>";
                        echo "Date of Attempt: " . $row["date_of_attempt"] . "<br>";
                        echo "Percentage: " . $row["percentage"] . "%<br>";
                      }
                    }
                    else {
                        echo "No quizzes taken yet";
                    }
                ?>
            </div>
            <form action="student_quiz.php"><br>
                <button type="submit" class = "submit">Go back to quiz portal</button>
            </form>

        </div>
    </body>
</html>