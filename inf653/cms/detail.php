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
include_once 'data.php';
include_once 'errorHelper.php';
include_once 'logging.php';

$data = new Data();
$itemData = array();
$listingId = '';
    
    if (isset($_POST["listingId"]))
    {
        $listingId = filter_var($_POST["listingId"], FILTER_SANITIZE_STRING); //clean
        $itemData = $data->getListingIdData($listingId);      
            echo '<nav class="navbar bg-dark justify-content-center">';
            echo '<span class= "navbar-brand text-white font-weight-bold text-center">'.$listingId.' - Details</span>';//set listingId number in header element 
            echo '</nav>';        
    }
    else
    {
        $log = new Logging();
        $logMessage = date("H:i:s")." :detail.php error: listingId not in postArray \n";
        $log->setDataLog($logMessage);
        $error = new ErrorHelper('OOPS! The selected listing is unavailable at this time. Please try again later.');
        $error->showErrorMessage();
        exit();//if error view fails
    }
                                            
    echo '</div>';
    if (!empty($itemData))//check for empty array
    {        
        echo '<div class="d-md-flex flex-row align-items-center border-bottom-2 bg-light-blue">';
        echo '<div class="col-12 col-md-6 p-2">
              <img class="img-fluid img-thumbnail mx-auto d-block" style="max-width: 100%; height: auto;"
               src="data:image/jpeg;base64,'.base64_encode($itemData["photo_full"]).'">
              </img></div>';
        echo '<div class="col-12 col-md-6">';
        echo '<div class="flex-row font-weight-bold p-2">
                '.$itemData["name"].'
              </div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Price: </div>
                <div class="d-inline-flex">'.$itemData["price"].'</div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Location: </div>
                <div class="d-inline-flex">'.$itemData["location"].'</div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Listing URL: </div>
                <div class="d-inline-flex"><a class="nav-link font-weight-bold" href="'.$itemData["listing_url"].'">Listing Site</a></div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Category: </div>
                <div class="d-inline-flex">'.$itemData["category"].'</div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Description: </div>
                <div class="d-inline-flex">'.$itemData["description"].'</div></div>';
        echo '</div>';
        echo '</div>';        
    }
?> 

<footer class="s-footer page-footer text-center bg-dark text-white py-3">	
    <p>
        &copy; <?php echo date("Y"); ?> INF653 - CMS - James Kobell
    </p>
</footer>
</body>
</html>