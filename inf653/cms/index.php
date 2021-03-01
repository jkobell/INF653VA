<!DOCTYPE html>
<html lang="en">
<head>
  <title>NexTechClassifieds.com | Top ten picks</title>
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
    <span class="text-white">TOP TEN PICKS</span>  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="/inf653/cms/addItem.php"> Add Item</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="https://www.nextechclassifieds.com/"> NexTechClassifieds.com</a></li>              
        </ul>
    </div>  
</nav>    
    
<?php //begin php

//get all filenames in directory 'Listings' to $listingsFilenames
$listingsFilenames = glob('./listings/*.txt');

// table made with Bootstrap
echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="p-2 text-center font-weight-bold border-right border-left" style="width: 5%;">Details</div>';
echo '<div class="p-2 text-center font-weight-bold border-right" style="width: 20%;">Photo</div>';
echo '<div class="p-2 text-center font-weight-bold border-right" style="width: 25%;">Name</div>';
echo '<div class="p-2 text-center font-weight-bold border-right" style="width: 15%;">Price</div>';
echo '<div class="p-2 text-center font-weight-bold border-right" style="width: 15%;">Location</div>';
echo '<div class="p-2 text-center font-weight-bold border-right" style="width: 15%;">Category</div>';
echo '<div class="p-2 text-center font-weight-bold border-right" style="width: 5%;">Edit</div>';
echo '</div>';

//loop through collection of files. Get each files content and create a table row
foreach ($listingsFilenames as $value)
    {
        $dataFilePath = $value;
        $fileContent = file_get_contents($dataFilePath);
        if (!empty($fileContent)) //check empty file
        {
            $data = unserialize($fileContent);
            echo '<div class="d-md-flex flex-row align-items-center border">';
            echo '<div class="p-2 text-center" style="width: 5%;">
                    <form class="form-inline" method="post" action="/inf653/cms/detail.php">
                    <input type="hidden" name="listingId" value="'.htmlspecialchars($data["Listing ID"]).'">
                    <input type="submit" value="Details">
                    </form>  
                  </div>';
            
            echo '<div class="p-2 text-center" style="width: 20%;">
                    <a target="_self" href="/inf653/cms/images/full/'.htmlspecialchars($data["Listing ID"]).'_full.jpeg">
                    <img class="img-thumbnail" style="height: 80px;" src='.htmlspecialchars($data["Photo Thumb"]).'></img></a>
                  </div>';              

            echo '<div class="p-2 text-center" style="width: 25%;">'.htmlspecialchars($data["Name"]).'</div>';
            echo '<div class="p-2 text-center" style="width: 15%;">'.htmlspecialchars($data["Price"]).'</div>';
            echo '<div class="p-2 text-center" style="width: 15%;">'.htmlspecialchars($data["Location"]).'</div>';
            echo '<div class="p-2 text-center" style="width: 15%;">'.htmlspecialchars($data["Category"]).'</div>';
            echo '<div class="p-2 text-center" style="width: 5%;">
                    <form class="form-inline" method="post" action="/inf653/cms/editItem.php" id="editForm">
                    <input type="hidden" name="listingId" value="'.htmlspecialchars($data["Listing ID"]).'">
                    </form>
                    <button type="submit" form="editForm" value="Submit">Edit</button>
                  </div>';
            echo '</div>';
            
        }           
    }
echo '</tbody>';
echo '</table>';

?> <!--end php-->


<footer>	
    <p class="copyright">
        &copy; <?php echo date("Y"); ?> INF653 - CMS - James Kobell
    </p>
</footer>
</body>
</html>