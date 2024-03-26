<?php
//test6

class Crud
{
    private $pdo;
    //Ik stop hier via de constructor een instantie van het PDO object in.
    //Ik kan nu in de rest van de class gebruik maken van het PDO object.

    public function __construct()
    {
        $server = getenv('MYSQL_SERVER');
        $username = getenv('MYSQL_LAURA_WEBSHOP_USER');
        $password = getenv('MYSQL_LAURA_WEBSHOP_PASSWORD');
        $dbname = getenv('MYSQL_LAURA_WEBSHOP_DATABASE');

        $this->pdo = new PDO("mysql:port=3306;host=$server;dbname=$dbname", $username, $password);
    }

    //generieke database functies
    public function createRow($sql, $params)
    {
        $statement = $this->pdo->prepare($sql);
        // $statement->setFetchMode(PDO::FETCH_OBJ);
        $success = $statement->execute($params);

        if ($success) {
            // Return the last inserted ID
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function readOneRow($sql, $params, $className = null)
    {
        $statement = $this->pdo->prepare($sql);
        // foreach ($params as $key => $value) {
        //     $statement->bindValue($key, $value);
        // }
        $statement->execute($params);

        if ($className) {
            return $statement->fetchObject($className);
        } else {
            return $statement->fetch(PDO::FETCH_OBJ);
        }
    }

    public function readMultipleRows($sql, $params, $className = null)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);

        if ($className) {
            return $statement->fetchAll(PDO::FETCH_CLASS, $className);
        } else {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function updateRow($sql, $params)
    {
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($params);
    }

    public function deleteRow($sql, $params)
    {
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($params);
    }
}
