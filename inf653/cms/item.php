<?php
include_once 'logging.php';

class Item
{
    private $listingId;
    private $name;
    private $photoThumb;
    private $photoFull;
    private $price;
    private $description;
    private $location;
    private $listingUrl;
    private $category;

    const MIN_LENGTH = 1;
    const MAX_LENGTH_PRICE = 10;
    const MAX_LENGTH = 50;
    const MAX_LENGTH_NAME = 100;
    const MAX_LENGTH_DESCRIPTION = 250;

    const VALUE_NOT_SET = 'value not set';
    const LENGTH_INVALID = 'length of text is invalid.';
    public function getListingId()
    {
        if (isset($this->listingId))
        {
            return $this->listingId;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setListingId($value)
    {
        ((strlen($value) > self::MAX_LENGTH) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setListingId error: form text length \n") :
        $this->listingId = $value;
    }

    public function getName()
    {
        if (isset($this->name))
        {
            return $this->name;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setName($value)
    {
        ((strlen($value) > self::MAX_LENGTH_NAME) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setName error: form text length \n") :
        $this->name = $value;
    }

    public function getPhotoThumb()
    {
        if (isset($this->photoThumb))
        {
            return $this->photoThumb;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setPhotoThumb($value)
    {
        ((strlen($value) > self::MAX_LENGTH) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setPhotoThumb error: form text length \n") :
        $this->photoThumb = $value;
    }

    public function getPhotoFull()
    {
        if (isset($this->photoFull))
        {
            return $this->photoFull;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setPhotoFull($value)
    {
        ((strlen($value) > self::MAX_LENGTH) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setPhotoFull error: form text length \n") :
        $this->photoFull = $value;
    }

    public function getPrice()
    {
        if (isset($this->price))
        {
            return $this->price;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setPrice($value)
    {
        ((strlen($value) > self::MAX_LENGTH_PRICE) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setPrice error: form text length \n") :
        $this->price = $value;
    }

    public function getDescription()
    {
        if (isset($this->description))
        {
            return $this->description;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setDescription($value)
    {
        ((strlen($value) > self::MAX_LENGTH_DESCRIPTION) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setDescription error: form text length \n") :
        $this->description = $value;
    }

    public function getLocation()
    {
        if (isset($this->location))
        {
            return $this->location;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setLocation($value)
    {
        ((strlen($value) > self::MAX_LENGTH) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setLocation error: form text length \n") :
        $this->location = $value;
    }

    public function getListingUrl()
    {
        if (isset($this->listingUrl))
        {
            return $this->listingUrl;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setListingUrl($value)
    {
        ((strlen($value) > self::MAX_LENGTH) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setListingUrl error: form text length \n") :
        $this->listingUrl = $value;
    }

    public function getCategory()
    {
        if (isset($this->category))
        {
            return $this->category;
        } 
        else
        {
            return self::VALUE_NOT_SET;
        }        
    }

    public function setCategory($value)
    {
        ((strlen($value) > self::MAX_LENGTH) || (strlen($value) < self::MIN_LENGTH)) ?
        $this->logMessage(date("H:i:s")." :item.setCategory error: form text length \n") :
        $this->category = $value;
    }
    
    private function logMessage($value)
    {
        $log = new Logging();
        $logMessage = $value;
        $log->setItemLog($logMessage);
    }
}
?>