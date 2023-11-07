<?php

class Crud
{
    private $pdo;
    // Ik stop hier via de constructor een instantie van het PDO object in met mijn server-data als input.
    //Ik kan nu in de rest van de class gebruik maken van PDO object.

    public function __construct()
    {
        $servername = 'localhost';
        $username = 'laura_web_shop_user';
        $password = 'ditiseenwachtwoord';
        $dbname = 'lauras_webshop';

        $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }

    // hier komen de generieke database functies
    public function createRow($sql, $params)
    {
        //sql moet hier dus input worden
        $statement = $this->pdo->prepare($sql);
        // //ik haal de method prepare uit het PDO object
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
