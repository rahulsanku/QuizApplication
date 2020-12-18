<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
        <div class="container">
            <div class = "homebutton">
                <form action="index.php">
                    <input type="submit" value="Back to home" />
                </form> 
            </div>
            <form action="register_process.php" method="post">
		
  		<div class="container">
        <h1>NEW USER</h1>
        <label for="name"><b></b></label>
        <input type="text" placeholder="Enter Name" name="name" class="reg" required>
        <br>

        <label for="email"><b></b></label>
        <input type="text" placeholder="Enter Email Address" name="email" class="reg" required>
        <br>

        <label for="psw"><b></b></label>
        <input type="password" placeholder="Enter Password" name="psw" class="reg" required>
        <br>
        <input type="radio" id="student" name="id" value="student">
        <label for="student">Student</label><br>
        <input type="radio" id="staff" name="id" value="staff">
        <label for="staff">Staff</label><br>


    		<br><br>
    		<button type="submit" class = "create">Create</button>

    		<br>
  		</div>
	</form>



        </div>
    </body>
</html>