<?php
$c = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt($c, CURLOPT_URL, "https://www.mangaeden.com/api/manga/".$info['i']);
curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($c, CURLOPT_HEADER, 0);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
$response= curl_exec($c);

if($response === FALSE){
    echo "Curl error: ".curl_error($c);
}

$mangainfo= json_decode($response, true);