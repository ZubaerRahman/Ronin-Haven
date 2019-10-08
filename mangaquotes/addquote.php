<?php
include_once "../includes/header.php";
include_once "../includes/navbar.php";
?>

<title>addquote</title>
</head>
<body>

<?php
if(isset($_GET['submit'])){

    $manga= $_GET['manga'];
    $author= $_GET['author'];
    $quote= $_GET['quote'];
    if($manga=="")header("Location: addquote.php?no_manga_added");
    if($author=="")header("Location: addquote.php?no_author_added");
    if($quote=="")header("Location: addquote.php?no_quote_added");

    $result= array('manga'=>$manga, 'author'=>$author, 'quote'=>$quote);

    $oldfile = file_get_contents('quotes.json');
    $tempArray = json_decode($oldfile);

//append additional json to json file
    $tempArray[] = $result;
    $newfile = json_encode($tempArray, JSON_PRETTY_PRINT);

    file_put_contents('quotes.json', $newfile);
//    file_put_contents('mangaquotes/quotes.json', implode(PHP_EOL, $result), FILE_APPEND);
}

?>

    <form action="addquote.php" method="get">
        <input type="text" name="manga" placeholder="where is it from?">
        <input type="text" name="author" placeholder="who said it?">
        <input type="text" name="quote" placeholder="what's the quote?">
        <input type="submit" name="submit" value="add">
    </form>

</body>
</html>