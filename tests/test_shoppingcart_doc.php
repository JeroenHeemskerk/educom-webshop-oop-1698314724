<?php

require_once("../views/shoppingcart_doc.php");

$cart = [["id" => "3", "name" => "Marbled soap", "amount" => "1", "subTotal" => '550', "pricetag" => "550", "image_url" => "../Images/marbled-soap.jpg"],  ["id" => "4", "name" => "Oats soap", "amount" => '1', "subTotal" => '400', "pricetag" => "400", "image_url" => "../Images/oats-soap.jpg"]];
$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'shoppingcart', 'total' => '450',  'menu' => $menu, 'cart' => $cart);

$view = new ShoppingcartDoc($data);
// uitvoer van de publieke functie show
$view->show();
