<?php

require_once("../views/webshop_doc.php");

// nieuwe instantie (object) van de klasse BasicDoc
//!! Hier stop ik mijn data IN de klasse constructor functie !!

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'webshop', 'products' => [], 'menu' => $menu);
$view = new WebshopDoc($data);
// uitvoer van de publieke functie show

$view->show();
