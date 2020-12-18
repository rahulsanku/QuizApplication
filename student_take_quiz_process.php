<?php
// Start the session
    session_start();
    require_once('config.php');

    $quizid = $_SESSION['quizid'];
    $sql = "SELECT * FROM quiz_questions, questions WHERE quiz_questions.quiz_id = " . $quizid . " AND quiz_questions.question_id = questions.question_id";
    $result = $mysqli->query($sql);
    $marks = 0;
    $total = 0;
    $date = date("d/m/Y");
    $option = "";
    
    $studentid = $_SESSION['student_id'];
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
            $choice = $_POST[$row["question_id"]];
            if($choice == $row["answer"]) {
                $marks=$marks+1;
            }
            $total = $total + 1;
      }
    }
    $per = ($marks/$total)*100;
    $stmt = $mysqli->prepare("INSERT INTO quiz_attempt (student_id, quiz_id, date_of_attempt, percentage) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $studentid, $quizid, $date, $per);
    if($stmt->execute()){
        header("Location: student_quiz.php");
        }
    else{
        echo($mysqli->error);
    }

?>