<?php
    if(isset($_POST['submit']))
    {

            require "../includes/dbconnect.php";

            $username= mysqli_real_escape_string($conn, $_POST['username']);
            $email= mysqli_real_escape_string($conn, $_POST['email']);
            $password= mysqli_real_escape_string($conn, $_POST['pwd']);
            $repeatpassword= mysqli_real_escape_string($conn, $_POST['rpwd']);

            if (empty($username) || empty($email) || empty($password) || empty($repeatpassword)){

                    header("Location: ../signup/signup.php?error=emptyfields&uid=".$username."&email=".$email);
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../signup/signup.php?error=invalidemail&uid=".$username);

            }

            else if($password !== $repeatpassword){
                header("Location: ../signup/signup.php?error=passwordnomatch&uid=".$username."&email=$email");

            }

            else{
                    $stmt= mysqli_stmt_init($conn);
                    $stmt->prepare("INSERT INTO users (username, email, user_pwd) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $username, $email, password_hash($_POST['rpwd'], PASSWORD_DEFAULT));
                    $stmt->execute();

                    header("Location: ../index.php?signup=success");
                }
    }


    else{
        header("Location: ../index.php?signup=failed");
    }