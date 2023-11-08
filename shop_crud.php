<?php

class ShopCrud
{
    private $crud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }


    public function createOrder($userId, $total)
    {
        $sql = "INSERT INTO orders (user_id, total_amount) VALUES (:user_id, :total_amount)";
        $params = ["user_id" => $userId, "total_amount" => $total];

        return $this->crud->createRow($sql, $params);
    }


    public function readAllProducts($productIds = [])
    {
        $sql = 'SELECT * FROM products';
        $params = [];

        if (!empty($productIds)) {
            $sql = $sql . ' WHERE id IN (' . trim(str_repeat(', ?', count($productIds)), ', ') . ')';
            $params = $productIds;
        }

        // var_dump($sql);
        return $this->crud->readMultipleRows($sql, $params);
    }


    public function readProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $params = ["id" => $id];

        return $this->crud->readOneRow($sql, $params);
    }


    public function createOrderlines($orderlineValues)
    {
        $count = count($orderlineValues) / 3;
        $rowPlaces = '(' . implode(', ', array_fill(0, 3, '?')) . ')';
        $allPlaces = implode(', ', array_fill(0, $count, $rowPlaces));

        $sql = "INSERT INTO orderlines (order_id, product_id, product_quantity) 
            VALUES $allPlaces";
        $params = $orderlineValues;

        return $this->crud->createRow($sql, $params);
    }
}
