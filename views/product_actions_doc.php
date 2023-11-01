<?php

require_once('forms_doc.php');
class ProductActionsDoc extends FormsDoc
{

    protected function showActionButton($page, $submitButtonText, $actionType, $productId = null)
    {
        // $page = 'product'
        // $submitButtonText = 'add to cart'
        // value = 'addToCart' 'removeFromCart'

        $this->showFormStart();

        echo "<input hidden name='id' value='$productId'>
            <input hidden name='action' value='$actionType'>";

        $this->showFormEnd($page, $submitButtonText);
    }
}
