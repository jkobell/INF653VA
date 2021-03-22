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
include_once 'item.php';
include_once 'data.php';

$item = new Item();
$data = new Data();
$itemData = array();

    //use listingId to get filename for reading from flat file
    if (isset($_POST["listingId"]))
    {
        $item->setListingId(filter_var($_POST["listingId"], FILTER_SANITIZE_STRING)); //clean
        $item->setName(filter_var($_POST["name"], FILTER_SANITIZE_STRING)); //clean
        $item->setCategory(filter_var($_POST["category"], FILTER_SANITIZE_STRING)); //clean
        $item->setPrice(filter_var($_POST["price"], FILTER_SANITIZE_STRING)); //clean
        $item->setLocation(filter_var($_POST["location"], FILTER_SANITIZE_STRING)); //clean
        $item->setDescription(filter_var($_POST["description"], FILTER_SANITIZE_STRING)); //clean

        $itemData = $data->getListingIdData($item->getListingId());        
          
        echo '<nav class="navbar bg-dark justify-content-center">';
        echo '<span class= "navbar-brand text-white font-weight-bold text-center">Saving...  '.$item->getListingId().'</span>';
        echo '</nav>';         
    }    
    //print_r($itemData);
    $saveData = array(
        'Listing ID' => $itemData["Listing ID"],
        'Name' => $item->getName(),
        'Photo Full' => $itemData["Photo Full"],
        'Photo Thumb' => $itemData["Photo Thumb"],
        'Category' => $item->getCategory(),
        'Price' => $item->getPrice(),
        'Location' => $item->getLocation(),
        'Listing URL' => $itemData["Listing URL"],
        'Description' => $item->getDescription()
        );        
        //print_r($saveData);        
        $data->putItemData($saveData);
                
        header("Location: /inf653/cms/index.php");
        exit();    

?>