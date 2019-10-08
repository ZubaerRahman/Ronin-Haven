<?php

    $dbhost= "localhost";
    $dbusername= "root";
    $dbpassword= "";
    $dbname= "animeproject";

    $conn= new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
