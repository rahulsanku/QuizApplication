<?php
// Start the session
    session_start();
    require_once('config.php');

    $name = $_POST["name"];
    $author = $_POST["author"];
    $duration = $_POST["duration"];
    $choice = $_POST["available"];
    $quizid = $_SESSION['update_quiz'];

    $stmt = "UPDATE quiz SET name = '$name', author = '$author', duration = '$duration', available = '$choice' WHERE quiz_id = '$quizid'";
    $result = $mysqli->query($stmt);

    $mysqli -> close();

    header("Location: modify_quiz.php");

?>


