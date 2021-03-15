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
$data = array();

    //use listingId to get filename for reading from flat file
    if (isset($_POST["listingId"]))
    {
        $listingId = filter_var($_POST["listingId"], FILTER_SANITIZE_STRING); //clean
        $dataFilePath = './listings/'.$listingId.'.txt';
        $fileContent = file_get_contents($dataFilePath);
        if (!empty($fileContent))
        {
            $data = unserialize($fileContent);        
            echo '<nav class="navbar bg-dark justify-content-center">';
            echo '<span class= "navbar-brand text-white font-weight-bold text-center">'.$listingId.' - Details</span>';//set listingId number in header element 
            echo '</nav>';           
        }       
        else
        {
            include_once 'error.php';
        }
    }
                                            
    echo '</div>';
    if (!empty($data))//check for empty array
    {        
        echo '<div class="d-md-flex flex-row align-items-center border-bottom-2 bg-light-blue">';
        echo '<div class="col-12 col-md-6 p-2">
              <img class="img-fluid img-thumbnail mx-auto d-block" style="max-width: 100%; height: auto;" src='.$data["Photo Full"].'>
              </img></div>';
        echo '<div class="col-12 col-md-6">';
        echo '<div class="flex-row font-weight-bold p-2">
                '.$data["Name"].'
              </div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Price: </div>
                <div class="d-inline-flex">'.$data["Price"].'</div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Location: </div>
                <div class="d-inline-flex">'.$data["Location"].'</div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Listing URL: </div>
                <div class="d-inline-flex"><a class="nav-link font-weight-bold" href="'.$data["Listing URL"].'">Listing Site</a></div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Category: </div>
                <div class="d-inline-flex">'.$data["Category"].'</div></div>';
        echo '<div class="flex-row p-2">
                <div class="d-inline-flex font-weight-bold">Description: </div>
                <div class="d-inline-flex">'.$data["Description"].'</div></div>';
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