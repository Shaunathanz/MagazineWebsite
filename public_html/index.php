<?php
    //open magazines.txt
    $dir = '';
    require 'script/loadMagazines.php';

    //generate html string from table in random order
    shuffle($magazineAssociativeArray);
    //foreach ($magazineAssociativeArray as $magazine)
    foreach ($magazineAssociativeArray as $magazine)
    {
        $magazineHTML .= 
            "<div class=\"magazine-item\">
            <img src=\"" . $magazine["imgSrc"] . "\">
            <p class=\"magazine-item-title\">" . $magazine["title"] . "</p>
            <P>Published: " . $magazine["published"] . "</P>
            <P>$" . $magazine["price"] . "</P>
            </div>";
    }
?>

<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/home.css?<?php echo time();?>" media="screen" />
        <script src="script/script.js"></script>
        <meta charset="utf-8"/>
        <title id="tab_name">Manga</title>
    </head>

    <body>
        <div id="logo">
            <h1 id="text">Manga</h1>
        </div>

        <div id="nav">
            <ul>
                <li id="li_review">Write a Review</li>
            </ul>
        </div>

        <div id="content">
            <div id="magazine-grid" onclick="window.open('pages/placeorder.html', '_self')"><?php echo $magazineHTML;?></div>
        </div>
    </body>
    </html>