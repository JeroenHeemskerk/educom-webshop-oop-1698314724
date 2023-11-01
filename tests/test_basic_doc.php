<?php

require_once("../views/basic_doc.php");

// nieuwe instantie (object) van de klasse BasicDoc
//!! Hier stop ik mijn data IN de class constructor functie !!

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'basic', 'menu' => $menu);
$view = new BasicDoc($data);
// uitvoer van de publieke functie show

$view->show();
