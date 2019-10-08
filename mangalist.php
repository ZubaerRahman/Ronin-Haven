<?php
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<link rel="stylesheet" href="style/mangalist.css">
<script src="scripts/mangasearch.js" defer></script>
</head>
<body>

<br>

<div id="search"><span>&nbsp</span>
    <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/5f/5f0ff67ddb14cc214a31d477329c2d7f397ddd3b.jpg" alt="NANI!?">
    <input type="text" id="myInput" onkeyup="searchmanga()" placeholder="What are you looking for?">
</div>

<br>
<br>

<div id="main">

    <div id="main-top">
        <h3>Manga List</h3>

        <div class="dropdown">
            <button class="dropbtn" onclick=location.href="mangalist.php">Order
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="mangalist.php?sort=a-z">Name [A-Z]</a>
                <a href="mangalist.php?sort=z-a">Name [Z-A]</a>
            </div>

        </div>

    </div>

        <ol id="list">
            <?php include_once "./includes/full_list.php" ?>
        </ol>

</div>

</body>











<?php
//include_once "includes/header.php";
//include_once "includes/navbar.php";
//?>
<!--<link rel="stylesheet" href="style/mangalist.css">-->
<!--<script src="scripts/mangalist.js"></script>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<br>-->
<!---->
<!--<div id="search"><span>&nbsp</span>-->
<!--    <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/5f/5f0ff67ddb14cc214a31d477329c2d7f397ddd3b.jpg" alt="NANI!?">-->
<!--    <input type="text" id="myInput" onkeyup="searchmanga()" placeholder="What are you looking for?">-->
<!--</div>-->
<!---->
<!--<div style="margin-left: 1%; padding-top: 30px">-->
<!--    <h3 style="margin-left: 1%">Manga List</h3>-->
<!--    <ol id="list">-->
<!--    </ol>-->
<!--</div>-->
<!---->
<!--<button id="myButton" style="display: none"></button>-->
<!---->
<!--</body>-->
<!---->
<!--<script>-->
<!--    loadJSON();-->
<!--    init();-->
<!--</script>-->
