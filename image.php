<?php
if(isset($_GET['id'])) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, sprintf('https://cdn.mangaeden.com/mangasimg/%s', $_GET['id']));
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $picture = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpeg');
    echo $picture;
}

elseif($_GET['pageid']){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, sprintf('https://cdn.mangaeden.com/mangasimg/%s', $_GET['pageid']));
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $picture = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpeg');
    echo $picture;

}

else{
    http_response_code(404);
    include('errors/error404.html'); // provide your own HTML for the error page
    die();
}