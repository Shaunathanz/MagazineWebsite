<?php 
    //this page is just a lazy copy&paste from procesorder.php so much unnamed code reuse exists.
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
?>

<!DOCTYPE html>
    <html>
        <head>
            <link rel='stylesheet' type='text/css' href='../styles/home.css?<?php echo time();?>' media='screen' />
            <script src='../script/script.js'></script>
            <meta charset='utf-8'/>
            <title id='tab_name'>Process Order</title>
        </head>
        
        <body>
            <div id='logo'>
                <h1 id='text'>Review Submitted</h1>
            </div>
        
            <div id='content3'>
                <div id = 'orderTotal'>
                    <h2><?php echo $title;?></h2>
                    <p id='total'><?php echo $rating;?> / 5</p>
                    <h3 id="reviewText">"<?php echo $review?>"</h3>
                </div>
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