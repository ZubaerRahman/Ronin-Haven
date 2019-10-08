<?php
include_once "includes/header.php";
include_once "includes/navbar.php";
?>

<title>Index</title>
</head>
<body>


<div class="container-fluid">

    <div class="jumbotron" style="margin-top: 20px">

        <?php
        $quotes= json_decode(file_get_contents('mangaquotes/quotes.json'), true);
        $quote= $quotes[rand(0, sizeof($quotes)-1)];
        echo "<p style='font-family: Lora,serif; font-size: 1.8rem'>\"".$quote['quote']."\"</p>";
        echo "<small style='font-family: Lora,serif;font-size: 1.1rem'>&nbsp-".$quote['author'].", </small>";
        echo "<small style='font-family: Lora,serif;font-size: 1.1rem'>".$quote['manga']."</small>";

        ?>

    </div>

    <div class="row">

        <div class="col col-lg-4 col-md-4 d-none d-lg-block">

        </div>

        <div class="col col-lg-4 col-md-4 col-sm-4">
            <a class="btn btn-dark btn-block" href="mangalist.php">Full manga list</a>
        </div>

        <div class="col col-lg-4 col-md-4 d-none d-lg-block">

        </div>

    </div>




</div>




<br>




</body>
</html>