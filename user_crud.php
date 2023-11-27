<?php

class UserCrud
{
    private $crud;

    public function __construct(Crud $crud)
    {
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
        // deze functie gebruik ik nooit. Overbodig?
        // bij UPDATE nooit WHERE vergeten!
        $sql = "UPDATE users SET email= :email, name = :name, password = :password WHERE id= :id";
        $params = ["id" => $id, "email" => $email, "name" => $name, "password" => $password];

        return $this->crud->updateRow($sql, $params);
    }

    public function deleteUser($id)
    {
        //deleteRow
        // deze functie gebruik ik nooit. Overbodig?
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = ["id" => $id];

        return $this->crud->deleteRow($sql, $params);
    }
}
