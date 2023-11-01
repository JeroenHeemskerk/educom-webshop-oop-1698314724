<?php

require_once("productservice_doc.php");

class WebshopDoc extends ProductService
{
    protected function showHeaderContent()
    {
    }

    protected function showContent($pageData)
    {
        $productsArray = $pageData['products'];

        foreach ($productsArray as $product) {
            $this->showProductCard($product);
        }
    }

    private function showProductCard($product)
    {
        require_once('session-manager.php');
        require_once('form-fields.php');
        $userIsLoggedIn = isUserLoggedIn();

        echo
        "<div class='card text-center card-outer-container' style='width: 50rem'>
            <a href='index.php?page=product&id=" . $product['id'] . "'>
                <div class='card-inner-container'>
                    <img class='card-img' src='" . $product['image_url'] . "' alt='soap image'></br>
                    <div class ='product-text card-body'>
                        <h4 class = 'card-title'>" . $product['name'] . "</h4>
                        <p class = 'card-text'> " . $product['description'] . "</p>
                        <span>&euro;" . number_format(($product['pricetag'] / 100), 2, ',') . "</span>";
        if ($userIsLoggedIn) {
            $this->showActionButton('webshop', 'add to cart', 'addToCart', $product["id"]);
        }
        echo "
                    </div>
                </div>
            </a>
        </div>";
    }
}
