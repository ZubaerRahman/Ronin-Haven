<?php
if(!isset($_GET['submit'])){
    header("Location: ../addquote.php?login=failed");
}
else{
    $manga= $_GET['manga'];
    $author= $_GET['author'];
    $quote= $_GET['quote'];

    $result= array('manga'=>$manga, 'author'=>$author, 'quote'=>$quote);

    $oldfile = file_get_contents('mangaquotes/quotes.json');
    $tempArray = json_decode($oldfile);

//append additional json to json file
    $tempArray[] = $result;
    $newfile = json_encode($tempArray);

    file_put_contents('mangaquotes/quotes.json', $newfile);

}
?>