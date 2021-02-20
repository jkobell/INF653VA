<!DOCTYPE html>
<html lang="en">
<head>
  <title>NexTechClassifieds.com | Top ten picks</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href=".\style\main.css">
   <!--include required for Bootstrap  -->
</head>
<body id="indexBody">
    <div id="indexHeaderDiv">
        <h3 id="indexHeader">NexTechClassifieds.com - Top ten picks</h3>
    </div>
    <div id="list">
<?php //begin php

//get all filenames in directory 'Listings' to $listingsFilenames
$listingsFilenames = glob('./listings/*.txt');

//form with table
echo '<form method="post" action= "/inf653/cms/detail.php">';
echo '<table id="table">';
echo '<tr>';
echo '<th>Details</th><th>Photo</th><th>Name</th><th>Price</th><th>Location</th><th>Category</th>';
echo '</tr>';

//loop through collection of files. Get each files content and create a table row
foreach ($listingsFilenames as $value)
    {
        $dataFilePath = $value;
        $fileContent = file_get_contents($dataFilePath);
        if (!empty($fileContent)) //check empty file
        {
            $data = unserialize($fileContent);            
            echo '<tr>';
            echo '<td><input type="submit" name="listingId" value="'.htmlspecialchars($data["Listing ID"]).'"></td>';             
            echo '<td><a target="_self" href="/inf653/cms/images/full/'.htmlspecialchars($data["Listing ID"]).'_full.jpeg">
                    <img id="imgThumb" src='.htmlspecialchars($data["Photo Thumb"]).'></img></a></td>';
            echo '<td>'.htmlspecialchars($data["Name"]).'</td>';
            echo '<td>'.htmlspecialchars($data["Price"]).'</td>';
            echo '<td>'.htmlspecialchars($data["Location"]).'</td>';
            echo '<td>'.htmlspecialchars($data["Category"]).'</td>';
            echo '</tr>';
        }           
    }

echo '</table>';
echo '</form>';
?> <!--end php-->

</div>
<footer>	
    <p class="copyright">
        &copy; <?php echo date("Y"); ?> INF653 - CMS - James Kobell
    </p>
</footer>
</body>
</html>