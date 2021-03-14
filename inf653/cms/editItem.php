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
            echo '<span class= "navbar-brand text-white font-weight-bold text-center">Edit - '.$listingId.'</span>';//set listingId number in header element 
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
              <img class="img-fluid img-thumbnail mx-auto d-block" style="max-width: 50%; height: auto;" src='.$data["Photo Full"].'>
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
    
    echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
    echo '<div class="col-12 col-md-11">';
    echo '<div class="d-md-flex flex-row">';
    echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right border-left">Save</div>';    
    echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Name</div>';
    echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Price</div>';
    echo '<div class="col-12 col-md-5 p-2 text-center font-weight-bold border-right">Description</div>';
    echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Location</div>';
    echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Category</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Cancel</div>';
    echo '</div>';
    

    echo '<div class="d-md-flex flex-row align-items-center bg-light-blue">';
    echo '<div class="col-12 col-md-11">';
    

    echo '<form class="needs-validation" method="post" action="/inf653/cms/formSave.php" nonvalidate>';

    
    echo '<div class="d-md-flex form-row">';
     
    echo '<div class="col-12 col-md-1 p-2 text-center">                
            <input type="hidden" name="listingId" value="'.htmlspecialchars($data["Listing ID"]).'">
            <input type="submit" value="Save">
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Name: </div>
            <div class="d-flex">

               <input type="text" class="form-control" style="text-align: center;" name="name" value="'.htmlspecialchars($data["Name"]).'" required maxlength="100">

            </div>            
          </div>';            
    echo '<div class="col-12 col-md-1 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Price: </div>
            <div class="d-flex">            

                <input type="text" class="form-control" style="text-align: right;" name="price" value="'.htmlspecialchars($data["Price"]).'"required maxlength="10">

            </div>            
          </div>';
    echo '<div class="col-12 col-md-5 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Description: </div>
            <div class="d-flex">            

                <input type="text" class="form-control" style="text-align: center;" name="description" value="'.htmlspecialchars($data["Description"]).'"required maxlength="250">

            </div>            
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Location: </div>
            <div class="d-flex">            

                <input type="text" class="form-control" style="text-align: center;" name="location" value="'.htmlspecialchars($data["Location"]).'"required maxlength="50">

            </div>           
          </div>';   
    echo '<div class="col-12 col-md-1 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Category: </div>
            <div class="d-flex">            

                <input type="text" class="form-control" style="text-align: center;" name="category" value="'.htmlspecialchars($data["Category"]).'"required maxlength="50">

            </div>            
          </div>';


    echo '</div>';
    echo '</form>';
    echo '</div>';    
    
    echo '<div class="col-12 col-md-1 p-2 text-center">';  
    echo '<form method="post" action="/inf653/cms/index.php">
            <input type="hidden" name="listingId" value="'.htmlspecialchars($data["Listing ID"]).'">
            <input type="submit" value="Cancel">
          </form>';
    echo '</div>'; 

    echo '</div>';
     
?> 

<footer class="s-footer page-footer text-center bg-dark text-white py-3">	
    <p>
        &copy; <?php echo date("Y"); ?> INF653 - CMS - James Kobell
    </p>
</footer>
</body>
</html>