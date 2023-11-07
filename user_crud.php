<?php

class UserCrud
{
    private $crud;

    public function __construct(Crud $crud)
    {
        //volgens mij is dit de jusite manier om de klasse Crud te injecteren
        $this->crud = $crud;
    }

    public function createUser($email, $name, $password)
    {
        //saveUser
        $sql = "INSERT INTO users (email, name, password) VALUES (:email, :name, :password)";
        $params = ["email" => $email, "name" => $name, "password" => $password];

        return $this->crud->createRow($sql, $params);
    }

    public function readUserByEmail($email)
    {
        //findUserByEmail

        $sql = "SELECT * FROM users WHERE email = :email";
        $params = ["email" => $email];

        return $this->crud->readOneRow($sql, $params);
    }

    public function updateUser($id, $email, $name, $password)
    {
        //updateRow
        $sql = "UPDATE users SET email= :email, name = :name, password = :password WHERE id= :id";
        // moet dit via id?
        $params = ["id" => $id, "email" => $email, "name" => $name, "password" => $password];

        return $this->crud->updateRow($sql, $params);
    }

    public function deleteUser($id)
    {
        //deleteRow
        $sql = "SELECT * FROM users WHERE id = :id";
        // moet dit via id?
        $params = ["id" => $id];

        return $this->crud->deleteRow($sql, $params);
    }
}
