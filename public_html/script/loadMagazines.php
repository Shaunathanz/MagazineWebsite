<?php
    //open magazines.txt
    $magazineFile;
    $magazineDataArray;
    $magazineHTML = '';
    $magazineAssociativeArray = array();
    try
    {
        $magazineDataCSV = '';
        $magazineFile = fopen($dir . "script/magazines.txt", "r") or die("ERROR: Unable to open magazines.txt!");
        flock($magazineFile, LOCK_SH);
        $magazineDataCSV = file_get_contents($dir . "script/magazines.txt");
        if($magazineDataCSV === false || $magazineDataCSV == '')
        {
            throw new Exception("NoFileContentsException");
        }
        $attributes = explode(PHP_EOL, $magazineDataCSV);
        foreach ($attributes as &$attribute)
        {
            $magazineDataArray[] = str_getcsv($attribute);
        }
    } 
    catch (Exception $e)
    {
        echo "ERROR: " . $e->getMessage();
    }
    catch (NoFileContentsException $e)
    {
        echo "ERROR: The file contents are empty!";
    }

    //create associative array from data
    foreach ($magazineDataArray as &$value)
    {
        $magazine = array(
            "imgSrc" => "images/" . $value[0],
            "title" => $value[1],
            "published" => $value[2],
            "price" => $value[3]);
        $magazineAssociativeArray[$magazine["title"]] = $magazine;
    }

    $_POST["Magazines"] = $magazineAssociativeArray;
    //echo print_r($magazineAssociativeArray);
    //echo print_r($_POST["Magazines"]);
?>