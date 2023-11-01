<?php

require_once("../views/about_doc.php");

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'about', 'menu' => $menu);
// nieuwe instantie (object) van de klasse AboutDoc
$view = new AboutDoc($data);
// uitvoer van de publieke functie show (die staat in HtmlDoc)
$view->show();
