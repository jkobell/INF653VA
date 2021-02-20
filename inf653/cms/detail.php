<!DOCTYPE html>
<html lang="en">
<head>
  <title>NexTechClassifieds.com | Details Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href=".\style\main.css">
   <!--include required for Bootstrap  -->
</head>

<body id="detailBody">
    <div id="detailTopDiv">

<?php
$listingId = '';
$data = array();

    //use listingId to get filename for reading from flat file
    if (isset($_POST["listingId"]))
    {
        $listingId = filter_var($_POST["listingId"], FILTER_SANITIZE_STRING); //clean
        $dataFilePath = ".\\listings\\".$listingId.".txt";
        $fileContent = file_get_contents($dataFilePath);
        if (!empty($fileContent))
        {
            $data = unserialize($fileContent);        
            echo '<h1>'.$listingId.' DETAILS</h1>'; //set listingId number in header element           
        }
        else
        {
            //user error message if file is empty
            echo '<h3>Listing: '.$listingId.' is no longer available. Please choose a different listing.</h3>';
        }
    }

echo '</div>';
if (!empty($data))//check for empty array
{
    echo '<div id="detailDiv">';
    echo '<img id="imgFull" src='.$data["Photo Full"].'></img>';
    echo '<h2 id="detailH2">'.$data["Name"].'</h2>';
    echo '<p id="inlineP"><span id="detailName">Price: </span>
            <span id="detailValue">'.$data["Price"].'</span></p>';
    echo '<p id="inlineP"><span id="detailName">Location: </span>
            <span id="detailValue">'.$data["Location"].'</span></p>';
    echo '<p id="inlineP"><span id="detailName">Listing URL: </span>
            <span id="detailValue"><a href="'.$data["Listing URL"].'">NexTechClassifieds.com/listing</a></span></p>';
    echo '<p id="inlineP"><span id="detailName">Category: </span>
            <span id="detailValue">'.$data["Category"].'</span></p>';
    echo '<p id="inlineP"><span id="detailName">Description: </span>
            <span id="detailValue">'.$data["Description"].'</span></p>';
    echo '</div>';
}
?>
<footer>	
    <p class="copyright">
        &copy; <?php echo date("Y"); ?> INF653 - CMS - James Kobell
    </p>
</footer>
</body>
</html>