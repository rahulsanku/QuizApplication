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
        <title>QUIZ</title>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1> YOUR DETAILS</h1>
                <?php
                    $email = $_SESSION['email'];
                    $sql1 = "SELECT name, email, student_id FROM student";
                    $result1 = $mysqli->query($sql1);
                    while($rowx = $result1->fetch_assoc()) {
                        if($rowx["email"] == $email) {
                            echo "Student ID: ". $rowx["student_id"]."<br>";
                            echo "Name: ". $rowx["name"]."<br>";
                            echo "Email: ". $rowx["email"]."<br>";
                        }
                    }
                ?>
                <h1>AVAILABLE QUIZZES</h1>
                <?php
                    
                    $sql = "SELECT name, author, duration, available FROM quiz";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        if($row["available"] == 'Y') {
                            echo "Name: " . $row["name"] . "<br>" ;
                            echo "Author: " . $row["author"] . "<br>";
                            echo "Duration: ". $row["duration"] . " minutes". "<br>";
                            echo "<br>";
                        }
                      }
                    } else {
                      echo "0 quizzes available";
                    }
                ?>
                <form action="student_take_quiz.php" method = "get"><br>
                    <select name = "id">
                        <?php
                            $sql = "SELECT quiz_id, name, available FROM quiz";
                            $result = $mysqli->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                if($row["available"] == 'Y') {
                                    echo "<option value=". $row["quiz_id"] . ">" . $row["name"] . "</option>";
                                }
                              }
                            } 
                        ?>
                    </select>
                    <button type="submit" class = "submit">Take Quiz</button>
                </form>
                <form action="student_quiz_marks.php"><br>
                    <button type="submit" class = "submit">View Quiz Marks</button>
                </form>
                <form action = "logout.php"><br>
                    <button type="submit" class = "submit">Logout</button>
                </form>
            </div>

        </div>
    </body>
</html>
