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
                <form action="index.php">
                    <button type="submit" class = "submit">Back to home</button>
                </form> 
            <form action="staff_login_process.php" method="post">
		
      <h1>STAFF LOGIN</h1>
    		<label for="email"></label>
    		<input type="text" placeholder="Enter Email" name="email" class="email" required>
   			<br>

   			<label for="password"></label>
    		<input type="password" placeholder="Enter Password" name="password" class="email" required>

    		<br><br>
    		<button type="submit" class = "submit">Login</button>

    		<br>

  		
	</form>


        </div>
    </body>
</html>