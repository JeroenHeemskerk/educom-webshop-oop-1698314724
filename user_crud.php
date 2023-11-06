<?php

class UserCrud
{
    private $crud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }

    public function readUserByEmail($email)
    {

        $sql = "SELECT * FROM users WHERE email = :email";
        $params = ["email" => $email];

        return $this->crud->readOneRow($sql, $params);
    }
}
