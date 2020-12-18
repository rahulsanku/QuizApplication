<?php
    session_start();
    require_once('config.php');


    $uname = $_POST["email"];
    $psw = $_POST["password"];
    
    $sql = "SELECT email, password, staff_id FROM staff";
    $result = $mysqli->query($sql);
    if($result){
        while($row = $result->fetch_assoc()) {
            if($row["email"] == $uname){
                if($psw==$row["password"]){
                    $_SESSION['email'] = $uname;
                    $_SESSION['staff_id'] = $row["staff_id"];
                    $mysqli -> close();
                    echo "LOGIN SUCCESS";
                    header("Location: staff_quiz.php");
                    exit;
                }
                else{
                    echo "<script>
                            alert('LOGIN FAILED - EMAIL OR PASSWORD INCORRECT');
                            </script>";
                    header("Location: staff_login.php");
                    exit;

                }
            }
        }
        echo "Database has no records, please register";
        
    }

    $mysqli -> close();

?>
    