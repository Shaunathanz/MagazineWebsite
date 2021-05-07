<?php 
    $name = $_POST['name'];
    $qty_magazines = $_POST['qty_magazines'];
    $qty_subscriptions = $_POST['qty_subscriptions'];
    $magazinePrice = 1.99;
    $subscriptionPrice = 19.99;
    $orderTotal;
    $discountType = "N/A";
    $discountAmount;
    $tax = 0.05;
    $totalTax;
    $date = date("m/d/y h:m:s A");
    $add_days = strtotime(date("m/d/y", strtotime($date)) . "+2 day");

    $orderSubTotal = number_format((float) (($magazinePrice * $qty_magazines) + ($subscriptionPrice * $qty_subscriptions)), 2, '.', '');

    //check for 10 percent discount
    if($qty_subscriptions == 3 || $qty_subscriptions == 4)
    {
        $discountType = "10% Off Your Order";
        $discountAmount = number_format((float) ($orderSubTotal * .1), 2, '.', '');
    }
    //check for 1 free subscription discount
    else if($qty_subscriptions > 4)
    {
        $discountType = "1 Free Subscription";
        $discountAmount = number_format((float) 19.99, 2, '.', '');;
    } else {
        $discountAmount = 0;
    }

    //apply discount to subtotal
    $orderSubTotal -= $discountAmount;

    $orderTotal = number_format((float) $orderSubTotal * (1 + $tax), 2, '.', '');
    $totalTax = number_format((float) $orderSubTotal * $tax, 2, '.', '');
?>

<!DOCTYPE html>
    <html>
        <head>
            <link rel='stylesheet' type='text/css' href='../styles/home.css' media='screen' />
            <script src='../script/script.js'></script>
            <meta charset='utf-8'/>
            <title id='tab_name'>Process Order</title>
        </head>
        
        <body>
            <div id='logo'>
                <h1 id='text'><?php echo $name;?>'s Order Summary</h1>
            </div>
        
            <div id='content3'>
                <table id='table'>
                    <tr id='table-headers'>
                        <th id='table-header-item':>Item</th>
                        <th id='table-header-qty'>Quantity</th>
                    </tr>
                    <tr>
                        <td>Magazines</td>
                        <td><?php echo $qty_magazines;?></td>
                    </tr>
                    <tr>
                        <td>Subscriptions</td>
                        <td><?php echo $qty_subscriptions;?></td>
                    </tr>
                </table>
            </div>
            <div id='discounts'>
                <table id='table'>
                    <tr id='table-headers'>
                        <th id='table-header-item':>Discount</th>
                        <th id='table-header-qty'>Savings</th>
                    </tr>
                    <tr>
                        <td><?php echo $discountType;?></td>
                        <td>$<?php echo $discountAmount;?></td>
                    </tr>
                </table>
            </div>
            <div id='content3'>
                <div id = 'orderTotal'>
                    <h3>Order Total</h3>
                    <p id='total'>$<?php echo $orderTotal;?></p>
                </div>
            </div>
            <div id='times'>
                <p><i>Purchased: <?php echo $date;?></i>
                <br><i>Last Day to Return: <?php echo date("m/d/y", $add_days) . " " . date("h:m:s A");?></i></p>
            </div>
        </body>
    </html>

<?php
    //Write / Append Text File
    $filename = "magazineorders.txt";
    $txt = $name . "," . $orderTotal . "," . $date . "\n";
    $orders = fopen($filename, "a+") or die("Unable to create/open file!");
    flock($orders, LOCK_SH);
    fwrite($orders, $txt);
    flock($orders, LOCK_UN);
    fclose($orders);
?>