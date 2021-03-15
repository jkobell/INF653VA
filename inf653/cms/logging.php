<?php
class Logging
{
    private $logMessage;
    
    public function setDataLog($value)
    {        
        file_put_contents('./logs/dataLog_'.date("Y-m-d").'.log', $value, FILE_APPEND);
    }

    public function setItemLog($value)
    {        
        file_put_contents('./logs/itemLog_'.date("Y-m-d").'.log', $value, FILE_APPEND);
    }
}

?>