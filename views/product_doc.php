<?php

require_once('productservice_doc.php');

class ProductDoc extends ProductServiceDoc
{

    protected function showHeaderContent()
    {
    }

    protected function showContent($pageData)
    {
        require_once('form-fields.php');
        $product = $pageData['product'];
        $userIsLoggedIn = $pageData['userLoggedIn'];
        $this->showProduct($product, $userIsLoggedIn);
    }

    private function showProduct($product, $userIsLoggedIn)
    {
        echo "<div class='card-body'> <img class = 'product-img' src='" . $product['image_url'] . "' alt='soap image' width='400' height='300'></br>
    <h4 class = 'card-title'>" . $product["name"] . "</h4></br>
    <p class = 'card-text'>" . $product["description"] . "</p></br>
    &#8364;" . number_format(($product['pricetag'] / 100), 2, ',') . "</br> </div>";
        //button gedeelte conditioneel gemaakt
        if ($userIsLoggedIn) {
            $this->showActionButton('product', 'add to cart', 'addToCart', $product["id"]);
        }
        //maak een extra hidden input, geef hem als naam: action en als value 'addToCart'
    }
}
