<?php
include_once 'logging.php';

class Data
{
    private $dataFilePath;
    private $dataFileContent;
    private $itemData = array();
    
    private function setDataFilePath($value)
    {
        $this->dataFilePath = './listings/'.$value.'.txt';
    }

    private function getDataFileContent($value)
    {
        return file_get_contents($value);
    }
    
    private function getItemData($value)
    {
        !empty($value) ? $fileData = unserialize($value) : $this->logMessage(date("H:i:sa")." :data.getItemData error: empty $dataFileContent \n");
        return $fileData;
    }
    
    public function getListingIdData($value)
    {
        isset($value) ? $this->setDataFilePath($value) : $this->logMessage(date("H:i:sa")." :data.getListingIdData error: $listinId not set \n");
        $this->dataFileContent = $this->getDataFileContent($this->dataFilePath);
        $this->itemData = $this->getItemData($this->dataFileContent);
        return $this->itemData;        
    }

    public function putItemData($dataArray)
    {
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

    private function logMessage($value)
    {
        $log = new Logging();
        $logMessage = $value;
        $log->setDataLog($logMessage);
    }
}


?>