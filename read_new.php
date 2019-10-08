<?php
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<link rel="stylesheet" href="style/read.css">

<?php
if(isset($_GET['chapterid'])) {
    $chapterid= $_GET['chapterid'];
    $response = file_get_contents("https://www.mangaeden.com/api/chapter/" . $chapterid);
    // Will dump a beauty json :3
    $result = json_decode($response, true);
    $pages = $result['images'];
//    foreach ($pages as $bruh) {
//        echo "<img src='image.php?pageid=" . $bruh[1] . "' alt=''>";
//    }
}
?>

</head>
<body>
<!--<img src="--><?php //echo($page[1]==null ? "errors/imgnotfound.jpg" : "image.php?pageid=".$page[1]); ?><!--" alt="bruh" height="500px" width="400px">-->
<div class="container-fluid">

    <div class="row">

        <div class="col col-lg-2 col-md-2 d-none d-xl-block">
            <a class="btn btn-dark btn-block" href="mangalist.php">Full manga list</a>
        </div>

        <div class="col col-lg-8 col-md-2 col-sm-4">
            <div id="prevnext">
                <br>





                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <?php
                                for($i=0; $i<sizeof($pages); $i++){
                                    echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=".$i."></li>";
                                }
                            ?>

                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="..." alt="First slide">
                            </div>
                            <?php

                                foreach ($pages as $bruh) {
                                    echo "<div class=\"carousel-item\">";
                                    echo "<img class='d-block w-100' src='image.php?pageid=" . $bruh[1] . "' alt=''>";
                                    echo "</div>";
                                }

                            ?>
<!--                            <div class="carousel-item active">-->
<!--                                <img class="d-block w-100" src="..." alt="First slide">-->
<!--                            </div>-->
<!--                            <div class="carousel-item">-->
<!--                                <img class="d-block w-100" src="..." alt="Second slide">-->
<!--                            </div>-->
<!--                            <div class="carousel-item">-->
<!--                                <img class="d-block w-100" src="..." alt="Third slide">-->
<!--                            </div>-->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


















                <br>
                <br>
            </div>
        </div>

        <div class="col col-lg-2 col-md-2 d-none d-xl-block">
            <a class="btn btn-dark btn-block" href="mangalist.php">Full manga list</a>
        </div>

    </div>






    <div class="row">


    </div>
</div>

</body>