<?php
include_once 'logging.php';
include_once 'errorHelper.php';
include_once 'dbConn.php';

class Data
{
    private $dataFilePath;
    private $dataFileContent;
    private $itemData = array();
    private $fileData;
        
    private function setDataFilePath($value)
    {
        $this->dataFilePath = './listings/'.$value.'.txt';
    }

    private function getDataFileContent($value)
    {
        try
        {
            if (file_get_contents($value))
            {
                return file_get_contents($value);
            }
            else
            {
                throw new Exception(':data.getDataFileContent error: listingId txt file not found');
            }             
        }
        catch(Exception $ex)
        {            
            $this->logMessage(date("H:i:s ").$ex."\n");
            $error = new ErrorHelper('OOPS! The selected listing is unavailable at this time. Please try again later.');
            $error->showErrorMessage();
            exit();//if error view fails
        }        
    }
    
    private function getItemData($value)
    {
        !empty($value) ? $this->fileData = unserialize($value) : $this->logMessage(date("H:i:sa")." :data.getItemData error: empty dataFileContent \n");
        return $this->fileData;
    }

    public function getListingIdData($value)
    {           
        try {
            $db = new DbConnect();
            $pdo = $db -> dbh;
            
            $query = 'SELECT * FROM items WHERE listing_id = :listing_id';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':listing_id', $value);
            $stmt->execute();
            $result = $stmt->fetch();
            return($result);
                //print_r($result);
            }
            
            catch (PDOException $e){
                $error_exception = $e->getMessage();
                return ($error_exception);
            }
            $stmt->closeCursor();
    }    
    
    public function getAllListings()
    {          
        try {
            $db = new DbConnect();
            $pdo = $db -> dbh;
            
            $query = 'SELECT * FROM items';
            $stmt = $pdo->prepare($query);
            
            $stmt->execute();
            $result = $stmt->fetchAll();
            return($result);
                //print_r($result);
            }
            
            catch (PDOException $e){
                $error_exception = $e->getMessage();
                return ($error_exception);
            }
            $stmt->closeCursor();
    }

    public function getListingData($value)
    {
        $this->dataFileContent = $this->getDataFileContent($value);
        $this->itemData = $this->getItemData($this->dataFileContent);
        return $this->itemData;
    }

    public function createItemData($dataArray)
    {
        try {
            $db = new DbConnect();
            $pdo = $db -> dbh;            
           
            $query = 'INSERT INTO items (listing_id, name, photo_full, photo_thumb, price, description, location, listing_url, category) 
                      VALUES (:listing_id, :name, :photo_full, :photo_thumb, :price, :description, :location, :listing_url, :category)'; 
            
            $stmt = $pdo->prepare($query);
            
            $stmt->bindValue(':listing_id', $dataArray['listing_id']);
            $stmt->bindValue(':name', $dataArray['name']);
            $stmt->bindValue(':photo_full', $dataArray['photo_full']);
            $stmt->bindValue(':photo_thumb', $dataArray['photo_thumb']);
            $stmt->bindValue(':price', $dataArray['price']);
            $stmt->bindValue(':description', $dataArray['description']);
            $stmt->bindValue(':location', $dataArray['location']);
            $stmt->bindValue(':listing_url', $dataArray['listing_url']);
            $stmt->bindValue(':category', $dataArray['category']);
                        
            $stmt->execute();            
                //print_r($result);
            }
            
            catch (PDOException $e){
                $error_exception = $e->getMessage();
                return ($error_exception);
            }
            $stmt->closeCursor(); 
    }

    public function putItemData($dataArray)
    {        
        try {
            $db = new DbConnect();
            $pdo = $db -> dbh;
            
            $query = "UPDATE items
                      SET name = :name,
                          price = :price,
                          description = :description,
                          location = :location,
                          category = :category
                      WHERE listing_id = :listing_id";            
            
            $stmt = $pdo->prepare($query);
            
            $stmt->bindValue(':name', $dataArray['name']);
            $stmt->bindValue(':price', $dataArray['price']);
            $stmt->bindValue(':description', $dataArray['description']);
            $stmt->bindValue(':location', $dataArray['location']);
            $stmt->bindValue(':category', $dataArray['category']);
            $stmt->bindValue(':listing_id', $dataArray['listing_id']);            
            $stmt->execute();            
                //print_r($result);
            }
            
            catch (PDOException $e){
                $error_exception = $e->getMessage();
                return ($error_exception);
            }
            $stmt->closeCursor(); 
    }
    
    public function getListingsFilenames()
    {
        try
        {
            if (glob('./listings/*.txt'))
            {
                $list = glob('./listings/*.txt');
                return $list;
            }
            else
            {
                throw new Exception(':data.getListingsFilenames error: glob');
            }            
        }
        catch(Exception $ex)
        {            
            $this->logMessage(date("H:i:s ").$ex." \n");
            $error = new ErrorHelper('OOPS! The selected page is unavailable at this time. Please try again later.');
            $error->showErrorMessage();
            exit();//if error view fails
        }       
    }

    private function logMessage($value)
    {
        $log = new Logging();
        $logMessage = $value;
        $log->setDataLog($logMessage);
    }
}
?>