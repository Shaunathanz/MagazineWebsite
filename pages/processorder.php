<?php 
    $magazine = $_POST['manga'];
    $qty = $_POST['quantity'];
    $price;
    $total;
    $tax = 0.1;
    $totalTax;
    $date = date("m/d/y h:m:s A");
    $add_days = strtotime(date("m/d/y", strtotime($date)) . "+2 day");

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
    $total = number_format((float) ($price * $qty) * (1 + $tax), 2, '.', '');
    $totalTax = number_format((float) ($price * $qty) * $tax, 2, '.', '');

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
                                <th id='table-header-tax'>Tax</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>$magazine</td>
                                <td>$qty</td>
                                <td>$$totalTax</td>
                                <td>$$total</td>
                            </tr>
                        </table>
                    </div>
                    <div id='times'>
                        <p><i>Purchased: " . $date . "</i>
                        <br><i>Last Day to Return: " . date("m/d/y", $add_days) . " " . date("h:m:s A") . "</i></p>
                    </div>
                    <div class='magazine-item-big'>
                        <img id='manga-img-big' src='../images/bokuNoHero.jpg'>
                    </div>
                </body>
            </html>";
?>