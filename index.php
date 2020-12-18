<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Log in</title>
        
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>LOGIN</h1><br><br>
                <form action="student_login.php"><br>
                    <input type="submit" value="Student Login" /><br>
                </form> 
                <form action="staff_login.php"><br>
                    <input type="submit" value="Staff Login" /><br>
                </form>
                <form action="register.php"><br>
                    <input type="submit" value="Register User" /><br>
                </form>
                
                
            </div>

        </div>
    </body>
</html>