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
        // writeOrderToDatabase($userId, $total)

        $sql = "INSERT INTO orders (user_id, total_amount) VALUES (:user_id, :total_amount)";
        $params = ["user_id" => $userId, "total_amount" => $total];

        return $this->crud->createRow($sql, $params);
    }


    public function readAllProducts($productIds = [])
    {
        //getProductsFromDatabase($productIds = []) 
        // Deze functie klopt nog niet // ??
        //prepared statements?

        $sql = 'SELECT * FROM products';

        if (!empty($productIds)) {
            $productIdsAsString = implode(",", $productIds);
            $sql = $sql . ' WHERE id IN (' . $productIdsAsString . ')';
        }

        $params = ["productIds" => $productIds];

        return $this->crud->readMultipleRows($sql, $params);
    }


    public function readProductById($id)
    {
        // findProductById($id)

        $sql = "SELECT * FROM products WHERE id = :id";
        $params = ["id" => $id];

        return $this->crud->readOneRow($sql, $params);
    }


    public function createOrderlines($orderlineValuesString)
    {
        // writeOrderlinesToDatabase($orderlineValuesString)
        // prepared statements?

        $sql = "INSERT INTO orderlines (order_id, product_id, product_quantity) 
            VALUES (:orderlineValuesString)";
        $params = ["orderlinesValuesString" => $orderlineValuesString];

        return $this->crud->createRow($sql, $params);
    }
}
