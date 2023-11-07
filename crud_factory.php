<?php

require_once("user_crud.php");
require_once("shop_crud.php");

class CrudFactory
{
    public $crud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }


    public function createCrud($name)
    {
        return new ($name . "Crud")($this->crud);
    }
}
