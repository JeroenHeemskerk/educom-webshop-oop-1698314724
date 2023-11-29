<?php

class AjaxDoc
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function sendResponse()
    {
        header('Content-Type: application/json');
        echo json_encode($this->model->data);
    }
}
