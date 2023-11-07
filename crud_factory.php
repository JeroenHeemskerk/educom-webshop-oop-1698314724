<?php

require_once("user_crud.php");

class CrudFactory
{
    public $crud;
    public $newCrud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }


    public function createCrud($name)
    {
        // Create new crud
        $this->newCrud = new ($name . "Crud")($this->crud);
        // hier staat nu schijnbaar 'PageCrud'
    }
}
