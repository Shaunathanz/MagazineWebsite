<?php
    $dir = '../'; //there has GOT to be a better way to do this...
    require $dir . 'script/loadMagazines.php';
    
    $options = '';
    foreach ($magazineAssociativeArray as $magazine)
    {
        $options .= 
            "<option value=\"" . $magazine["title"] . "\">" . $magazine["title"] . "</option>";
    }
?>

<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="../styles/home.css?<?php echo time();?>" media="screen" />
        <script src="../script/script.js"></script>
        <meta charset="utf-8"/>
        <title id="tab_name">Review</title>
    </head>
    
    <body>
        <div id="logo">
            <h1 id="text">Manga / Write a Review</h1>
        </div>
    
        <div id="content2">
            <form action="processreview.php" onsubmit="sanitizeInput();" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="title">Manga: </label>
                    </div>
                    <div class="col-75">
                        <select for="title" id="title" name="title" autocomplete="off" oninput = "btnEnable();"><?php echo $options;?></select>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-25">
                        <label for="rating">Rating: </label>
                    </div>
                    <div class="col-75">
                        <select id="rating" name="rating" autocomplete="off" oninput = "">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select> / 5
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-25">
                        <label for="review">Review: </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-100">
                        <textarea id="review" name="review" maxlength="500" rows="6" cols="46" autocomplete="off" oninput="btnEnable();" style="margin-top: 10px;"></textarea>
                    </div>
                </div>
                <br>
                <input id="btn_place-order" type="submit" value="Submit Review">
            </form>
        </div>
    </body>
    </html>