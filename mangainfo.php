<?php
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<link rel="stylesheet" href="style/mangainfo.css">
</head>
<body>

<?php

    if(isset($_GET['info'])) {
        $postedData = $_GET["info"]; //json object containing info about manga such as author/title etc.
        $info = json_decode($postedData, true);
        $mangacoverid = $info['im']; //id of the cover image that i'm getting from json object
//        echo(sprintf('<img alt="error" src="image.php?id=%s">', $mangacoverid));
        include_once "includes/getmangainfo.php";
    }
    else{
        echo "Information about this manga is not available at this time.";
    }
    ?>
    <br>

        <div class="left-column">
        Sometext


        </div>

        <div class="mangainfo">
                <h2 id="title"><?php echo $info['t']; ?></h2>
                <br>
                <figure class="cover">
                    <img src="<?php echo($mangacoverid==null ? "errors/imgnotfound.jpg" : "image.php?id=".$mangacoverid); ?>" alt="bruh" height="400px" width="300px">
                    <figcaption><?php echo($mangacoverid==null ? "Sorry, we couldn't find the cover for this manga :(" :"<i>Official cover art of \"".$info['t']."\"</i>"); ?></figcaption>
                </figure>

            <br>

            <div id="categories">
                <span id="categorytag">Genres</span>
                <?php if($mangainfo['categories']==null){echo "We don't know what categories does this manga belong to :( try some other time!";}else{
                    foreach ($mangainfo['categories'] as $x){echo "<span class='category'>".$x."</span>&nbsp ";}
                } ?>
            </div>

            <br>

            <div id="auth-art-date">
                <span id="author">
                    <?php if($mangainfo['author']==null){echo "We couldn't find the author :( try some other time!";}else{echo "Author: ".$mangainfo['author']."";} ?>
                </span>

                <span id="artist">
                    <?php if($mangainfo['artist']==null){echo "We couldn't find the author :( try some other time!";}else{echo "Artist: ".$mangainfo['artist']."";} ?>
                </span>

                <span id="date">
                    <?php if($mangainfo['released']==null){echo "We couldn't find the original release date :( try some other time!";}else{echo "Initial release: ".$mangainfo['released']."";} ?>
                </span>
            </div>

            <br>

            <p id="synopsis">
                <?php if($mangainfo['description']==null){echo "We couldn't find the synopsis :( try some other time!";}else{echo "Synopsis: \"".$mangainfo['description']."\"";} ?>
            </p>

            <br>
    <!--    <a class="viewchapters" href="chapterlist.php/?id=--><?php //echo $info['i'];?><!--">View full chapters list.</a>-->

            <form action="chapterlist.php" method="get">
                <input type="hidden" name="id" value="<?php echo $info['i'];?>"/>
                <input type="submit" value="View chapter list" />
            </form>

        </div>

        <div class="right-column">
            Sometext


        </div>


<?php
//$result = file_get_contents("https://www.mangaeden.com/api/manga/5c26af40719a1653396e49e8");
//// Will dump a beauty json :3
//var_dump(json_decode($result, true));
////?>



