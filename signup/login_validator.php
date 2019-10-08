<?php

    if(!isset($_POST['submit'])){
        header("Location: ../login.php?login=failed");
    }

    else{
        require "../includes/dbconnect.php";

        $username= mysqli_real_escape_string($conn, $_POST['username']);
        $pwd= mysqli_real_escape_string($conn, $_POST['pwd']);

        $stmt= mysqli_stmt_init($conn);
        $stmt->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result= mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            $pwdcheck = password_verify($pwd, $row['user_pwd']);
            if($pwdcheck == false){
                header("Location: ../signup/login.php?incorrectpwd");
                exit();
            }
            else if($pwdcheck == true){
                session_start();
                $_SESSION['user'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                header("Location: ../index.php/login=success");
                exit();
            }
        }
        else{
            header("Location: ../signup/login.php?usernotfound");
            exit();
        }

    }