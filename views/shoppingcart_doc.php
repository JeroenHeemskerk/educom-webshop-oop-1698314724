<?php

require_once("product_actions_doc.php");

class ShoppingcartDoc extends ProductActionsDoc
{
    public function __construct($myData)
    {
        $this->data = $myData;
    }

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Shoppingcart page</h1>';
    }

    protected function showContent()
    {
        $cart = $this->data['cart'];
        $total = $this->data['total'];

        //ik weet vantevoren niet hoeveel producten er in de cart zitten.
        // Dus dan moet ik een loop schrijven

        foreach ($cart as $productLine) {
            $this->showProductLine($productLine);
        }
        echo
        "<span>Total amount: &euro;" . number_format(($total / 100), 2, ",") . "</span></br></br>";

        $this->showActionButton('shoppingcart', "Complete order", 'completeOrder');
        //'completeOrder' kan ik dan uit de post body halen. 
    }

    private function showProductline($productLine)
    {
        echo
        "<div class='card text-center card-outer-container' style='width: 50rem'>
                <a href='index.php?page=product&id=" . $productLine['id'] . "'>
                    <div class='card-inner-container'>
                        <img class='shoppingcart-img' src='" . $productLine['image_url'] . "' alt='soap image'></br>
                        <div class='product-text card-body'>
                            <h8 class='card-title'>" . $productLine['name'] . "</h8></br>
                            <span>Price: &euro;" . number_format(($productLine['pricetag'] / 100), 2, ',') . "</span></br>
                            <div class='cart-quantity-wrapper'>";
        $this->showActionButton('shoppingcart', '-', 'removeFromCart', $productLine['id']);
        echo "<span>Amount: " . $productLine['amount'] . "</span>";
        $this->showActionButton('shoppingcart', '+', 'addToCart', $productLine['id']);
        echo "</div> <span>Total: &euro;" . number_format((($productLine['subTotal'] / 100)), 2, ",") . "</span>
                        </div>
                    </div>
                </a>
            </div>";
    }
}
