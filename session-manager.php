<?php

class SessionManager
{
    public function __construct()
    {
        session_start();
    }

    public function doLoginUser($userName, $userId)
    {
        $_SESSION['name'] = $userName;
        $_SESSION['id'] = $userId;
        $this->initializeCart();
    }

    public function isUserLoggedIn()
    {
        return isset($_SESSION['name']);
    }

    public function getLoggedInUserName()
    {
        return $_SESSION['name'];
    }

    public function getLoggedInUserId()
    {
        return $_SESSION['id'];
    }

    public function doLogOut()
    {
        session_unset();
    }

    public function getCart()
    {
        return $_SESSION['cart'];
    }

    public function initializeCart()
    {
        $_SESSION['cart'] = [];
    }

    public function addToCart($productId)
    {
        require_once('util.php');
        $_SESSION['cart'][$productId] = Util::getArrayVar($_SESSION['cart'], $productId, 0) + 1;
    }

    public function removeFromCart($productId)
    {
        $cart = $_SESSION['cart'];

        if (!array_key_exists($productId, $cart)) {
            return;
        }

        if ($cart[$productId] > 1) {
            $cart[$productId] = $cart[$productId] - 1;
        } else {
            //verwijder 1 array element
            unset($cart[$productId]);
        }

        $_SESSION['cart'] = $cart;
    }
}
