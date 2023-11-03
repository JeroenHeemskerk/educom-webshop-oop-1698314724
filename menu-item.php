<?php

class MenuItem
{
    public $linkValue;
    public $buttonText;

    public function __construct($linkValue, $buttonText)
    {
        $this->linkValue = $linkValue;
        $this->buttonText = $buttonText;
    }
}
