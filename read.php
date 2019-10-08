<?php
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<script src="scripts/movepage.js" defer></script>
<link rel="stylesheet" href="style/read.css">

<?php
if(isset($_GET['chapterid'])) {
    $chapterid= $_GET['chapterid'];
    $response = file_get_contents("https://www.mangaeden.com/api/chapter/" . $chapterid);
    // Will dump a beauty json :3
    $result = json_decode($response, true);
    $pages = $result['images'];
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
                <figure>
                    <img id="currentpage" src="" alt="page loading..." height="100%" width="100%">
                    <br>
                    <div id="bruh" style="display: flex; justify-content: center;">
                        <button class="btn btn-dark" id="prev" style="margin: 2px;">Prev</button>
                        <div id="pagenumber"></div>
                        <button class="btn btn-dark" id="next" style="margin: 2px;">Next</button>
                    </div>
                </figure>
                <button class="btn btn-dark" id="start" style="margin: 3px;">&nbspFirst Page&nbsp</button>
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