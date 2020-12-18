<?php
// Start the session
    session_start();
    require_once('config.php');
    $_SESSION['update_quiz'] = $_GET["id"];
    $quizid = $_GET["id"];

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
                <h1>Update Quiz</h1>
                <form action="update_quiz_process.php" method = "post"><br>
                    
                        <label for="name"></label>
                        <input type="text" placeholder="New Quiz Name" name="name" class="name" required>
                        <br>

                        <label for="author"></label>
                        <input type="text" placeholder="Enter New Author Name" name="author" class="author" required> <br>

                        <label for="duration"></label>
                        <input type="text" placeholder="Enter New Duration in minutes" name="duration" class="duration" required> <br>

                        <label>Is the quiz now available?</label><br>

                        <input type="radio" id="available" name="available" value="Y">
                        <label for="available">Yes</label><br>
                        <input type="radio" id="unavailable" name="available" value="N">
                        <label for="unavailable">No</label><br>
                    <button type="submit" class = "submit">Update this question from quiz</button>
                </form>
            </div>
            <form action="modify_quiz.php"><br>
                <button type="submit" class = "submit">Go back to modify quiz</button>
            </form>

        </div>
    </body>
</html>



