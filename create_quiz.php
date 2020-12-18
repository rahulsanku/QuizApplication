
<?php
    session_start();
    require_once('config.php');
    
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
                <h1>Create Quiz</h1>
                <form action = "create_quiz_process.php" method = "post"><br>
                    <label for="name"></label>
                    <input type="text" placeholder="Quiz Name" name="name" class="name" required>
                    <br>

                    <label for="author"></label>
                    <input type="text" placeholder="Enter Author Name" name="author" class="author" required> <br>
                    
                    <label for="duration"></label>
                    <input type="text" placeholder="Enter Duration in minutes" name="duration" class="duration" required> <br>
                    
                    <label>Is it available?</label>
                    
                    <input type="radio" id="available" name="available" value="Y">
                    <label for="available">Yes</label><br>
                    <input type="radio" id="unavailable" name="available" value="N">
                    <label for="unavailable">No</label><br>
                    
                    
                    <button type='submit' class = 'submit'>Submit</button>
                </form>
                <form action="modify_quiz.php"><br>
                <button type="submit" class = "submit">Go back to modify quiz</button>
            </form>

            </div>

        </div>
    </body>
</html>

]

