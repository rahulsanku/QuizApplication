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
            <form action="insert_into_quiz.php" method = "get"><br>
                <select name = "id">
                    <?php
                        $sql = "SELECT quiz_id, name, available FROM quiz";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                                echo "<option value=". $row["quiz_id"] . ">" . $row["name"] . "</option>";
                          }
                        } 
                    ?>
                </select>
                <button type="submit" class = "submit">Insert a question into selected quiz</button>
            </form>
            <form action="delete_from_quiz.php" method = "get"><br>
                <select name = "id">
                    <?php
                        $sql = "SELECT quiz_id, name, available FROM quiz";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                                echo "<option value=". $row["quiz_id"] . ">" . $row["name"] . "</option>";
                            
                          }
                        } 
                    ?>
                </select>
                <button type="submit" class = "submit">Delete a question from selected quiz</button>
            </form>
            <form action="update_quiz.php" method = "get"><br>
                <select name = "id">
                    <?php
                        $sql = "SELECT quiz_id, name, available FROM quiz";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                                echo "<option value=". $row["quiz_id"] . ">" . $row["name"] . "</option>";
                            
                          }
                        } 
                    ?>
                </select>
                <button type="submit" class = "submit">Update selected quiz</button>
            </form>
            <form action="create_quiz.php"><br>
                <button type="submit" class = "submit">Create a quiz</button>
            </form>
            <form action="delete_quiz.php"><br>
                <select name = "id">
                    <?php
                        $sql = "SELECT quiz_id, name, available FROM quiz";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                                echo "<option value=". $row["quiz_id"] . ">" . $row["name"] . "</option>";
                            
                          }
                        } 
                    ?>
                </select>
                <button type="submit" class = "submit">Delete selected quiz</button>
            </form>
            <form action="staff_quiz.php"><br>
                <button type="submit" class = "submit">Go back to quiz portal</button>
            </form>
            
            
        </div>
    </body>
</html>
