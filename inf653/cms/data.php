<?php
include_once 'logging.php';
include_once 'errorHelper.php';

class Data
{
    private $dataFilePath;
    private $dataFileContent;
    private $itemData = array();
    private $fileData;

    public function __construct()
    {

    }
    
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
        isset($value) ? $this->setDataFilePath($value) : $this->logMessage(date("H:i:sa")." :data.getListingIdData error: listingId not set \n");
        $this->dataFileContent = $this->getDataFileContent($this->dataFilePath);
        $this->itemData = $this->getItemData($this->dataFileContent);
        return $this->itemData;        
    }

    public function getListingData($value)
    {
        $this->dataFileContent = $this->getDataFileContent($value);
        $this->itemData = $this->getItemData($this->dataFileContent);
        return $this->itemData;
    }

    public function putItemData($dataArray)
    {
        isset($dataArray['Listing ID']) ? $this->setDataFilePath($dataArray['Listing ID']) : $this->logMessage(date("H:i:s")." :data.putItemData error: setDataFilePath \n");

        $result = file_put_contents($this->dataFilePath, serialize($dataArray));        
        if ($result != false)
        {
            return;
        }
        else
        {
            $this->logMessage(date("H:i:s")." :data.putItemData error: file_put_contents \n");
        }  
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