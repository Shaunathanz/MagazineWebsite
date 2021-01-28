<?php 
    $magazine = $_POST['manga'];
    $qty = $_POST['quantity'];
    $price;
    $total;

    //just in case the prices weren't all the same this is where you'd change them
    switch($magazine)
    {
        case "My Hero Academia # 9":
            $price = 9.99;
            break;
        case "Death Note # 1":
            $price = 9.99;
            break;
        case "Fullmetal Alchemist # 1":
            $price = 9.99;
            break;
        case "Hellsing # 1":
            $price = 9.99;
            break;
        case "Sgt. Frog # 6":
            $price = 9.99;
            break;
        case "Attack on Titan # 12":
            $price = 9.99;
            break;
        case "Space Dandy # 1":
            $price = 9.99;
            break;
        case "Uzumaki # 1":
            $price = 9.99;
            break;
        case "One Punch-Man # 1":
            $price = 9.99;
            break;
        case "Yotsuba&! # 1":
            $price = 9.99;
            break;
        default:
            break;
    }
    $total = number_format((float) ($price * $qty), 2, '.', '');

    echo 
        "<!DOCTYPE html>
            <html>
                <head>
                    <link rel='stylesheet' type='text/css' href='../styles/home.css' media='screen' />
                    <script src='../script/script.js'></script>
                    <meta charset='utf-8'/>
                    <title id='tab_name'>Process Order</title>
                </head>
                
                <body>
                    <div id='logo'>
                        <h1 id='text'>Manga / Process Order</h1>
                    </div>
                
                    <div id='content3'>
                        <table id='table'>
                            <tr id='table-headers'>
                                <th id='table-header-magazine':>Manga</th>
                                <th id='table-header-qty'>Qty</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>$magazine</td>
                                <td>$qty</td>
                                <td>$$total</td>
                            </tr>
                        </table>
                    </div>
                    <div class='magazine-item-big'>
                        <img id='manga-img-big' src='../images/bokuNoHero.jpg'>
                    </div>
                </body>
            </html>";
?>