<?php
// Start the session
session_start();
?>

<?php



    require_once('config.php');


    $name = $_POST["name"];
    $author = $_POST["author"];
    $duration = $_POST["duration"];
    $choice = $_POST["available"];
    
    $stmt = $mysqli->prepare("INSERT INTO quiz (name, author, duration, available) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $author, $duration, $choice);
    $stmt->execute();
    

    $mysqli -> close();

    header("Location: modify_quiz.php");

?>