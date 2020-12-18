<?php
// Start the session
session_start();
?>

<?php



    require_once('config.php');


    $uname = $_POST["email"];
    $psw = $_POST["password"];
    
    $sql = "SELECT email, password, student_id FROM student";
    $result = $mysqli->query($sql);
    if($result){
        while($row = $result->fetch_assoc()) {
            if($row["email"] == $uname){
                if($psw==$row["password"]){
                    $_SESSION['email'] = $uname;
                    $_SESSION['student_id'] = $row["student_id"];
                    $mysqli -> close();
                    header("Location: student_quiz.php");
                    exit;
                }
                else{
                    echo "<script>
                            alert('LOGIN FAILED - EMAIL OR PASSWORD INCORRECT');
                            </script>";
                    header("Location: student_login.php");
                    exit;

                }
            }
        }
        echo "Database has no records, please register";
        
    }

    $mysqli -> close();

?>
    