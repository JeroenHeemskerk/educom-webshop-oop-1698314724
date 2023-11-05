<?php

require_once('product_actions_doc.php');

class ProductDoc extends ProductActionsDoc
{

    public function __construct($myData)
    {
        $this->data = $myData;
    }

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Product page</h1>';
    }

    protected function showContent()
    {
        $product = $this->data->product;
        $this->showProduct($product);
    }

    private function showProduct($product)
    {
        echo "<div class='card-body'> <img class = 'product-img' src='" . $product['image_url'] . "' alt='soap image' width='400' height='300'></br>
    <h4 class = 'card-title'>" . $product["name"] . "</h4></br>
    <p class = 'card-text'>" . $product["description"] . "</p></br>
    &#8364;" . number_format(($product['pricetag'] / 100), 2, ',') . "</br> </div>";
        if ($this->data->sessionManager->isUserLoggedIn()) {
            $this->showActionButton('product', 'add to cart', 'addToCart', $product["id"]);
        }
    }
}
