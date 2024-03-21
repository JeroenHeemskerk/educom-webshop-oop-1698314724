<?php

class RatingCrud
{

    private $crud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }

    public function saveRating($userId, $productId, $rating)
    {
        // deze informatie die ik nodig heb als input hier, ga ik uit de post body halen

        $sql = "INSERT INTO ratings (user_id, product_id, star_count) VALUES (:user_id, :product_id, :star_count)";
        $params = ["user_id" => $userId, "product_id" => $productId, "star_count" => $rating];

        return $this->crud->createRow($sql, $params);
    }

    public function updateRating($userId, $productId, $newRating)
    {
        $sql = "UPDATE ratings SET star_count= :star_count WHERE product_id = :product_id AND user_id = :user_id";
        $params = ["user_id" => $userId, "product_id" => $productId, "star_count" => $newRating];

        return $this->crud->updateRow($sql, $params);
    }

    public function averageRatingOneProduct($productId)
    {
        $sql = "SELECT product_id, AVG(star_count) as rating FROM ratings WHERE product_id = :product_id";
        $params = ["product_id" => $productId];

        return $this->crud->readOneRow($sql, $params);
    }

    public function averageRatingAllProducts()
    {
        $sql = "SELECT product_id, AVG(star_count) as rating FROM ratings GROUP BY product_id";
        $params = [];
        // averge op de database gebruiken?
        //de database kan lang doen over SUM en AVG, dus eerst data ophalen en dan berekeningen doen?

        return $this->crud->readMultipleRows($sql, $params);
    }

    public function findRatingByProductAndUser($userId, $productId)
    {
        $sql = "SELECT star_count as rating FROM ratings WHERE product_id = :product_id AND user_id = :user_id";
        $params = ["user_id" => $userId, "product_id" => $productId];

        //als de rating nog niet bestaat, krijg ik 'false' terug.
        return $this->crud->readOneRow($sql, $params);
    }
}


//per product Id de rating (1-5) op te slaan voor deze user Id.
//per product Id de rating (1-5) bij te werken voor deze user Id.
//per product Id de "gemiddelde" rating op te vragen.
//een overzicht van alle "gemiddelde" ratings voor alle producten op te vragen.
