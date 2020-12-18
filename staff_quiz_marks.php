<?php
    session_start();
    require_once('config.php');
    if ( !isset( $_SESSION['staff_id'] ) ) {
        header("Location: index.php");
    }

?>
<html>
    <head>
        <title>QUIZ MARKS</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Quiz Marks</h1>
                <?php
                    $staffid = $_SESSION['staff_id'];
                    $id = 0;
                    $sql = "SELECT * FROM staff_quiz_attempt, quiz WHERE quiz.quiz_id = staff_quiz_attempt.quiz_id";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          if($row["staff_id"] == $staffid){
                            echo "<h2>QUIZ NAME: " . $row["name"] . " </h2><br>";
                            echo "Date of Attempt: " . $row["date_of_attempt"] . "<br>";
                            echo "Percentage: " . $row["percentage"] . "%<br>";
                          }
                      }
                    }
                    else {
                        echo "No quizzes taken yet";
                    }
                ?>
            </div>
            <form action="staff_quiz.php"><br>
                <button type="submit" class = "submit">Go back to quiz portal</button>
            </form>

        </div>
    </body>
</html>