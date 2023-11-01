<?php

require_once("../views/product_doc.php");

$product = array('id' => '1', 'name' => 'marbled soap', 'image_url' => "../Images/marbled-soap.jpg", 'description' => "dit is een beschrijving test test", 'pricetag' => "550");
$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'product', "product" => $product, "userLoggedIn" => true, 'menu' => $menu);

$view = new ProductDoc($data);
// uitvoer van de publieke functie show
$view->show();
