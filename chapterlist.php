<?php
include_once "includes/header.php";
include_once "includes/navbar.php";

?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->

<link rel="stylesheet" type="text/css" href="style/chapterlist.css">
</head>
<body>

<?php
$mangaid= $_GET['id'];
$response = file_get_contents("https://www.mangaeden.com/api/manga/".$mangaid);
// Will dump a beauty json :3
$result= json_decode($response, true);
$n_of_chapters= $result['chapters_len'];
$chapters= $result['chapters'];
?>

<br>
<div id="main">

<?php
echo "<ul id='chapterlist'>";

for($i=$n_of_chapters-1; $i>=0; $i--){
    $ichapter= $chapters[$i];
    echo '<li><a href="..\anime_project\read.php?chapterid=';
    echo $ichapter[3]."\">".$ichapter[0]."&nbsp Chapter ";
    echo " - ".$ichapter[2]."</a></li>";
}

echo "</ul>";
echo '<button type="button" id="loadMore">Load more</button>';
?>

</div>
</body>

<script>
    $(function () {
        $('#loadMore').click(function () {
            $('#chapterlist li:hidden').slice(0, 10).show();
            if ($('#chapterlist li').length == $('#chapterlist li:visible').length) {
                $('span ').hide();
            }
        });
    });
</script>

