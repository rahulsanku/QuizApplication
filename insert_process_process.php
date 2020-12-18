<?php
    session_start();
    require_once('config.php');


$quizid = $_SESSION['insert_quizid'];
$question = $_SESSION['insert_question'];
$option_num = $_SESSION["option_num"];
$answer = $_POST['answer'];

$stmt = $mysqli->prepare("INSERT INTO questions (question, answer) VALUES (?, ?)");
$stmt->bind_param('ss', $question, $answer);
$stmt->execute();

$sql = "SELECT * FROM questions";
$result = $mysqli->query($sql);
$question_id = 0;
while($row = $result->fetch_assoc()) {
    if ($row['question'] == $question) {
        $question_id = $row['question_id'];
    }
}
$l = 0;
while ($l < $option_num) {
    $x = $l+1;
    $option = $_POST[$x];
    $option_number = $l+1;
    $stmt2 = $mysqli->prepare("INSERT INTO question_options (question_id, option_number, option) VALUES ('$question_id', '$option_number', '$option')");
    $stmt2->execute();
    $l = $l+1;
}

$stmt3 = $mysqli->prepare("INSERT INTO quiz_questions (quiz_id, question_id) VALUES (?, ?)");
$stmt3->bind_param('ss', $quizid, $question_id);
if ($stmt3->execute()) {
    header("Location: modify_quiz.php");
}
else {
    echo($mysqli->error);
}




?>

    