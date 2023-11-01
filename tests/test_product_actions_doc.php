<?php

require_once("../views/product_actions_doc.php");

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'home', 'menu' => $menu);
// nieuwe instantie (object) van de klasse BasicDoc
$view = new ProductActionsDoc($data);
// uitvoer van de publieke functie show
$view->show();
// $test->showHeader($pageTitle);
