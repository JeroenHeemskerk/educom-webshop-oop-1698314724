<?php

class AjaxModel
{
    public $data = [];
    public $function;
    public $productId = 8;
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
        }
    }

    private function getAllRatings()
    {
        $this->data = $this->ratingCrud->averageRatingAllProducts();
    }

    private function updateRating()
    {
        // $userId = $this->sessionManager->getLoggedInUserId();
        $this->data = $this->ratingCrud->saveRating(17, $this->productId, 3);
    }
}
