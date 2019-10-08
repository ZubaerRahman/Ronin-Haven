<?php
    $data= json_decode(file_get_contents('./mangaedenapi/mangalist.json'), true);


    $manga= $data['manga'];

    if(isset($_GET['sort'])) {
        $order= $_GET['sort'];

        if ($order == "a-z") {

            asort($manga);
//    var_dump($trash);
            foreach ($manga as $element) {
                echo "<li><a href='mangainfo.php?info=";
                echo json_encode($element);
                echo "''>";
                echo $element['t'];
                echo "</a></li>";
            }
        } elseif ($order == "z-a") {

            arsort($manga);
//    var_dump($trash);
            foreach ($manga as $element) {
                echo "<li><a href='mangainfo.php?info=";
                echo json_encode($element);
                echo "''>";
                echo $element['t'];
                echo "</a></li>";
            }
        }
    }
    else {
        foreach ($manga as $element) {
            echo "<li><a href='mangainfo.php?info=";
            echo json_encode($element);
            echo "''>";
            echo $element['t'];
            echo "</a></li>";
        }
    }




//       var_dump($data['manga']);

//if($_GET['sort']=="a-z") {

//    for($i=0; $i<sizeof($manga); $i++){
//        for($j=0; $j<sizeof($manga)-$i; j++){
//            if($manga[$j][0].)
//        }
//    }


