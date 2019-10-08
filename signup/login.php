<?php
include_once "../includes/header.php";
include_once "../includes/navbar.php";
?>

<title xmlns="http://www.w3.org/1999/html">Signup</title>
<link rel="stylesheet" href="../style/form.css">
<style>
    p{color: red;}
</style>
</head>

<body>
<div class="form-wrap">
    <form class="myform" method="POST" action="login_validator.php">

        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username">
        <br>
        <br>
        <label for="pwd">Password</label>
        <br>
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <br>
        <input type="submit" name="submit" value="Login">

    </form>
