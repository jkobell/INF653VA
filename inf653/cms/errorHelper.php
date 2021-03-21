<?php
class ErrorHelper
{
    private $message;

    public function __construct($value)
    {
        $this->message = $value;
    }    

    public function getErrorMessage()
    {
        return $this->message;
    }

    public function setErrorMessage($value)
    {
        $this->message = $value;
    }

    public function showErrorMessage()
    {
       echo '<h1 style="text-align: center; margin-top: 20px;">'.$this->message.'</h1>'; 
    }
}
?>