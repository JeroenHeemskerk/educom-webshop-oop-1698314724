<?php

require_once("../crud.php");
require_once("../rating_crud.php");

$crud = new Crud();
$ratingCrud = new RatingCrud($crud);

// $saveRating = $ratingCrud->saveRating(17, 3, 4);
$updateRating = $ratingCrud->updateRating(17, 3, 5);
$avgRatingSingleProduct = $ratingCrud->averageRatingOneProduct(3);
$avgRatingAllProducts = $ratingCrud->averageRatingAllProducts();

// var_dump($saveRating);
var_dump($updateRating);
var_dump($avgRatingSingleProduct);
var_dump($avgRatingAllProducts);
