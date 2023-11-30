<?php

class AjaxModel
{
    public $data = [];
    public $function;
    public $userId;
    private $ratingCrud;

    public function __construct(RatingCrud $ratingCrud)
    {
        $this->ratingCrud = $ratingCrud;
    }

    public function executeAjaxFunction()
    {
        switch ($this->function) {
            case "getAllRatings":
                $this->getAllRatings();
                break;
            case "updateRating":
                $this->updateRating();
                break;
            case "getRatingById":
                $this->getRatingById();
                break;
        }
    }

    private function getAllRatings()
    {
        try {
            $this->data = $this->ratingCrud->averageRatingAllProducts();
        } catch (Exception $e) {
            require_once("logger.php");
            Logger::logError("getting ratings failed: " . $e->getMessage());
        }
    }

    private function getRatingById()
    {
        try {
            require_once("util.php");
            $id = Util::getUrlVar('id');
            //de value van de key id (uit de query params) zit nu in $id
            $this->data = $this->ratingCrud->averageRatingOneProduct($id);
        } catch (Exception $e) {
            require_once("logger.php");
            Logger::logError("getting rating for product failed: " . $e->getMessage());
        }
    }

    private function updateRating()
    {
        try {
            require_once("util.php");
            // haal benodigde vars uit POST body
            $productId = Util::getPostVar('productId');
            $rating = Util::getPostVar('rating');

            $ratingIfExists = $this->ratingCrud->findRatingByProductAndUser($this->userId, $productId);
            // in $ratingIfExists zit nu OF een eerdere rating OF false

            if (!$ratingIfExists) {
                //rating bestaat nog niet voor gebruiker, gebruik saveRating
                $this->ratingCrud->saveRating($this->userId, $productId, $rating);
            } else {
                //rating bestaat al, duys gebruik updateRating
                $this->ratingCrud->updateRating($this->userId, $productId, $rating);
            }

            // bereken nu de nieuwe rating en sla op in data
            $this->data = $this->ratingCrud->averageRatingOneProduct($productId);
        } catch (Exception $e) {
            require_once("logger.php");
            Logger::logError("updating rating for product failed: " . $e->getMessage());
        }
    }
}
