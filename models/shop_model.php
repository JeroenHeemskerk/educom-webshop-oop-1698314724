<?php

class ShopModel extends PageModel
{

    public $products = [];
    public $product;
    public $productLines = [];
    public $total;
    public $imageUrl;
    public $name;
    public $pricetag;
    public $id;
    public $amount;
    public $cart;


    public function __construct($pageModel)
    {
        PARENT::__construct($pageModel);
    }

    public function getWebshopData()
    {
        require_once('database-connection.php');
        try {

            $this->products = DatabaseConnection::getProductsFromDatabase();
        } catch (Exception $e) {
            logError("getting products failed: " . $e->getMessage());
            $this->genericErr = "Er is een technisch probleem. Probeer het later nog eens.";
        }

        // return?
    }

    public function getProductData()
    {
        require_once("util.php");
        $requestType = $_SERVER['REQUEST_METHOD'];

        if ($requestType == "POST") {
            // in productId zit nu het juiste product ID (de value). 
            $this->id = Util::getPostVar('id');
        } else {
            $this->id = Util::getUrlVar('id');
        }

        try {
            require_once("database-connection.php");
            $this->product = DatabaseConnection::findProductById($this->id);
            //in this->product zit nu een assoc array

        } catch (Exception $e) {
            logError("getting product failed: " . $e->getMessage());
            $this->genericErr = "Er is een technisch probleem. Probeer het later nog eens.";
        }
    }


    public function getShoppingcartData()
    {
        try {
            $cart = $this->sessionManager->getCart();
            $productIds = array_keys($cart);
            require_once("database-connection.php");
            $this->products = DatabaseConnection::getProductsFromDatabase($productIds);
            //this->products is nu een array(products) met daarin arrays(product)

            foreach ($cart as $productId => $amount) {
                // zoek naar de juiste index voor dit product
                $column = array_column($this->products, 'id');
                $index = array_search($productId, $column);

                $product = $this->products[$index];
                $subTotal = $amount * $product['pricetag'];
                $this->total += $subTotal;
                array_push($this->productLines, ['id' => $product['id'], 'name' => $product['name'], 'amount' => $amount, 'subTotal' => $subTotal, 'pricetag' => $product['pricetag'], 'image_url' => $product['image_url']]);
            }
        } catch (Exception $e) {
            logError("getting products failed: " . $e->getMessage());
            $this->genericErr = "Er is een technisch probleem. Probeer het later nog eens.";
        }
    }


    public function handleActions()
    {
        require_once("session-manager.php");
        $action = Util::getPostVar("action");
        switch ($action) {
            case "addToCart":
                $this->id = Util::getPostVar("id");
                $this->sessionManager->addToCart($this->id);
                $this->genericMessage = "Added item to your shopping cart!";
                break;
            case "removeFromCart":
                $this->id = Util::getPostVar("id");
                $this->sessionManager->removeFromCart($this->id);
                $this->genericMessage = "Removed item from your shopping cart!";
                break;
            case "completeOrder":
                require_once("database-connection.php");
                $userId = $this->sessionManager->getLoggedInUserId();
                try {
                    $this->completeOrder($userId);
                    $this->genericMessage = "Bedankt voor je bestelling!";
                } catch (Exception $e) {
                    logError("order failed: " . $e->getMessage());
                    $this->genericErr = "Bestellen is op dit moment niet mogelijk. Probeer het later nog eens.";
                }
                break;
            default:
        }
    }

    public function completeOrder($userId)
    {
        require_once("session-manager.php");
        $cart = $this->sessionManager->getCart();
        //total is hier in centen opgeslagen
        $total = 0;
        $productIds = array_keys($cart);
        require_once("database-connection.php");
        $products = DatabaseConnection::getProductsFromDatabase($productIds);
        $orderLines = [];

        foreach ($cart as $productId => $amount) {
            // zoek naar de juiste index voor dit product
            $column = array_column($products, 'id');
            $index = array_search($productId, $column);

            $product = $products[$index];
            $total += $amount * $product['pricetag'];
            array_push($orderLines, ['id' => $product['id'], 'amount' => $amount]);
        }

        $orderId = DatabaseConnection::writeOrderToDatabase($userId, $total);
        // in orderId zit nu de Id van de order!
        $orderlineData = $this->getOrderlineData($orderId, $orderLines);

        DatabaseConnection::writeOrderlinesToDatabase($orderlineData);
        $this->sessionManager->initializeCart();
        $this->genericMessage = "Bedankt voor je bestelling!";
    }

    private function getOrderlineData($orderId, $cart)
    {
        // in orderline moet zitten: order_id, product_id, product quantity. 
        $orderlineValueArray = [];

        foreach ($cart as $productline) {
            $orderline = "($orderId, " . $productline['id'] . ", " . $productline['amount'] . " )";

            array_push($orderlineValueArray, $orderline);
        }

        $orderlineValuesString = implode(',', $orderlineValueArray);

        return $orderlineValuesString;
    }
}
