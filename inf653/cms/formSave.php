<!DOCTYPE html>
<html lang="en">
<head>
  <title>NexTechClassifieds.com | Top Picks</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <link rel="stylesheet" type="text/css" href="./style/main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  
</head>
<body>

<?php

$listingId = '';
$name = '';
$category = '';
$price = '';
$location = '';
$description = '';
$data = array();

    //use listingId to get filename for reading from flat file
    if (isset($_POST["listingId"]))
    {
        $listingId = filter_var($_POST["listingId"], FILTER_SANITIZE_STRING); //clean
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); //clean
        $category = filter_var($_POST["category"], FILTER_SANITIZE_STRING); //clean
        $price = filter_var($_POST["price"], FILTER_SANITIZE_STRING); //clean
        $location = filter_var($_POST["location"], FILTER_SANITIZE_STRING); //clean
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING); //clean

        $dataFilePath = './listings/'.$listingId.'.txt';
        $fileContent = file_get_contents($dataFilePath);
        if (!empty($fileContent))
        {
            $data = unserialize($fileContent);        
            echo '<nav class="navbar bg-dark justify-content-center">';
            echo '<span class= "navbar-brand text-white font-weight-bold text-center">Saving...  '.$listingId.'</span>';
            echo '</nav>';           
        }       
        else
        {
            include_once 'error.php';
        }
    }
    
    //print_r($data);

    $saveData = array(
        'Listing ID' => $data["Listing ID"],
        'Name' => $name,
        'Photo Full' => $data["Photo Full"],
        'Photo Thumb' => $data["Photo Thumb"],
        'Category' => $category,
        'Price' => $price,
        'Location' => $location,
        'Listing URL' => $data["Listing URL"],
        'Description' => $description
        );
        
        //print_r($saveData);
        
        /* foreach ($saveData as $key => $value) {
            echo "key {$key} is {$value}\n";
            echo '<br />';    
        } */
        
        $dataFilePath = './listings/'.$listingId.'.txt';
        file_put_contents($dataFilePath, serialize($saveData));
        
        header("Location: /inf653/cms/index.php");
        exit();    

?>