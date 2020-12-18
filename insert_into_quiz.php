<?php
// Start the session
session_start();
?>
<?php
    require_once('config.php');

    $_SESSION['insert_quizid'] = $_GET["id"];

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
                <h1>Insert Question</h1>
                <form action = "insert_process.php" method = "post"><br>
                    <label for="question"></label>
                    <input type="text" placeholder="Question" name="question" class="question" required><br>
                    
                    <label>How many options would you like?</label>
                    <select name = "option_num">
                        <option value = 2>2</option>
                        <option value = 3>3</option>
                        <option value = 4>4</option>
                        <option value = 5>5</option>
                        <option value = 6>6</option>
                    </select><br>

                    
                    <button type='submit' class = 'submit'>Submit</button>
                </form>
            </div>
            <form action="modify_quiz.php"><br>
                <button type="submit" class = "submit">Go back to modify quiz</button>
            </form>

        </div>
    </body>
</html>



