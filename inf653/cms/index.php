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

<body id="indexBody">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <span class="navbar-brand">NexTechClassifieds.com</span>
    <span class="text-white">TOP PICKS</span>  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon bg-info"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="/inf653/cms/addItem.php"> Add Item</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="https://www.nextechclassifieds.com/"> NexTechClassifieds.com</a></li>              
        </ul>
    </div>  
</nav>    
    
<?php //begin php
include_once 'data.php';

$data = new Data();
$itemData = array();

// table made with Bootstrap
echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right border-left">Details</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Photo</div>';
echo '<div class="col-12 col-md-3 p-2 text-center font-weight-bold border-right">Name</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Price</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Location</div>';
echo '<div class="col-12 col-md-3 p-2 text-center font-weight-bold border-right">Category</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Edit</div>';
echo '</div>';

//loop through collection of files. Get each files content and create a table row
foreach ($data->getListingsFilenames() as $value)
    {        
        $itemData = $data->getListingData($value);        
        echo '<div class="d-md-flex flex-row align-items-center border-bottom-2 bg-light-blue">';
        echo '<div class="col-12 col-md-1 text-center p-3">
                <form class="form-inline mx-auto d-block" method="post" action="/inf653/cms/detail.php">
                    <input type="hidden" name="listingId" value="'.htmlspecialchars($itemData["Listing ID"]).'">
                    <input type="submit" value="Details">
                </form>  
                </div>';
        
        echo '<div class="col-12 col-md-1">
                <a target="_self" href="/inf653/cms/images/full/'.htmlspecialchars($itemData["Listing ID"]).'_full.jpeg">                    
                <img class="img-fluid img-thumbnail mx-auto d-block" style="max-width: 80%; height: auto;" src='.htmlspecialchars($itemData["Photo Thumb"]).'></img></a>
                </div>';              

        echo '<div class="col-12 col-md-3 text-center">'.htmlspecialchars($itemData["Name"]).'</div>';
        echo '<div class="col-12 col-md-1 text-center">'.htmlspecialchars($itemData["Price"]).'</div>';
        echo '<div class="col-12 col-md-2 text-center">'.htmlspecialchars($itemData["Location"]).'</div>';
        echo '<div class="col-12 col-md-3 text-center">'.htmlspecialchars($itemData["Category"]).'</div>';
        echo '<div class="col-12 col-md-1 text-center p-3">
                <form class="col form-inline mx-auto d-block" method="post" action="/inf653/cms/editItem.php"">
                    <input type="hidden" name="listingId" value="'.htmlspecialchars($itemData["Listing ID"]).'">
                    <input type="submit" value="Edit">
                </form>                    
                </div>';
        echo '</div>';                
    }
echo '</tbody>';
echo '</table>';

?> <!--end php-->

<footer class="page-footer text-center bg-dark text-white py-3">	
    <p>
        &copy; <?php echo date("Y"); ?> INF653 - CMS - James Kobell
    </p>
</footer>
</body>
</html>