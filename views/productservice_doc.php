<?php

class ProductServiceDoc extends BasicDoc
{
    protected function showActionButton($page, $submitButtonText, $actionType, $productId = null)
    {
        // $page = 'product'
        // $submitButtonText = 'add to cart'
        // value = 'addToCart' 'removeFromCart'

        showFormStart();

        echo "<input hidden name='id' value='$productId'>
            <input hidden name='action' value='$actionType'>";

        showFormEnd($page, $submitButtonText);
    }
}
