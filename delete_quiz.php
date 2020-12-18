<?php
    session_start();
    require_once('config.php');

?>

<?php
    $_SESSION['delete_quizid'] = $_GET["id"];
    $quizid = $_SESSION['delete_quizid'];
    $id = 0;
    $sql = "DELETE FROM quiz_questions WHERE quiz_id = '" . $quizid . "'";
    $result = $mysqli->query($sql);
    $sql = "DELETE FROM quiz_attempt WHERE quiz_id = '" . $quizid . "'";
    $result = $mysqli->query($sql);
    $sql = "DELETE FROM staff_quiz_attempt WHERE quiz_id = '" . $quizid . "'";
    $result = $mysqli->query($sql);
    
    $sql1 = "DELETE FROM quiz WHERE quiz_id = '" . $quizid . "'";
    if ($result1 = $mysqli->query($sql1)) {}
    else {
       echo($mysqli->error);
    }
    $sql = "UPDATE quiz_delete_logs SET staff_id = '" . $_SESSION['staff_id'] . "' WHERE quiz_id = " . $quizid;
    $result = $mysqli->query($sql);

    $mysqli -> close();

    header("Location: modify_quiz.php");
    
    
?>