<?php
include_once "../includes/header.php";
include_once "../includes/navbar.php";
?>

<title>Signup</title>
<link rel="stylesheet" href="../style/form.css">
<style>
    p{color: red;}
</style>
</head>

<body>
    <div class="form-wrap">
        <form class="myform" method="POST" action="signup_validator.php">

            <?php
                if(isset($_GET['error'])){
                    if($_GET['error']=="emptyfields"){
                        echo "<p>You haven't filled up all fields.</p>";
                    }
                }
            ?>

            <label for="username">Username</label>
            <br>
            <?php
            if(isset($_GET['uid'])){
            $uid= $_GET['uid'];
            echo ' <input type="text" name="username" placeholder="Username" value='.$uid.'> ';
            }
            else{
            echo ' <input type="text" name="username" placeholder="Username"> ';
            }
            ?>
            <br>
            <br>
            <label for="email"> Email</label>
            <br>
            <?php
            $email= isset($_GET['email']) ? $_GET['email'] : '';
            echo '<input type = "email" name = "email" value=" '.$email.' " placeholder = "Email">';
            if(isset($_GET['error'])) {
            if($_GET['error']=="invalidemail"){
                echo '<small style="color:red">You have entered an invalid email.</small>';
            }
            }
            ?>
            <br>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="pwd" placeholder="Password">
            <br>
            <br>
            <label for="password">Confirm password</label>
            <br>
            <input type="password" name="rpwd" placeholder="Confirm Password">
            <br>
            <?php
            if(isset($_GET['error'])){
            if($_GET['error']=="passwordnomatch") {
                echo "<small style='color: red'>The passwords you entered do not match.</small>";
            }
            }
            ?>
            <br>
            <br>
            <input type="submit" name="submit" value="Sign Up">

        </form>
    </div>





</body>
</html>