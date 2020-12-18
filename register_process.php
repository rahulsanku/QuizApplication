<?php
    session_start();
    require_once('config.php');


    $email = $_POST["email"];
    $password = $_POST["psw"];
    $name = $_POST["name"];
    $id = $_POST['id'];
    if($id == "student") {
        $sql1 = "SELECT email FROM student";
        $result = $mysqli->query($sql1);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                if($row["email"] == $email){
                    echo "Email already registered.";
                    exit;
                }
            }
            $stmt = $mysqli->prepare("INSERT INTO student (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $name, $email, $password);
            
            if($stmt->execute()){
                $_SESSION['email'] = $email;
                header("Location: index.php");
                }
            else{
                echo($mysqli->error);
                header("Location: index.php"); 
            }

        }
        
    }
    if($id == "staff") {
        $sql2 = "SELECT email FROM staff";
        $result1 = $mysqli->query($sql2);
        if ($result1) {
            while($row = $result1->fetch_assoc()) {
                if($row["email"] == $email){
                    echo "Email already registered.";
                    exit;
                }
            }
            $stmt = $mysqli->prepare("INSERT INTO staff (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $name, $email, $password);

            if($stmt->execute()){
                $_SESSION['email'] = $email;
                header("Location: index.php");
                }
            else{
                echo($mysqli->error);
                header("Location: index.php"); 
            }

        }
    }
    

    $mysqli -> close();

?>
    