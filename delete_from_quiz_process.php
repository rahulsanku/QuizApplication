<?php
    session_start();
    require_once('config.php');
?>

<?php




    
    $quizid = $_SESSION['delete_quizid'];
    $question_id = $_POST["qnum"];
    

    $stmt2 = "DELETE FROM quiz_questions WHERE question_id = '" . $question_id . "' AND quiz_id = '" . $quizid . "'";
    $mysqli->query($stmt2);



    header("Location: modify_quiz.php");

    

    $mysqli -> close();


?>
    