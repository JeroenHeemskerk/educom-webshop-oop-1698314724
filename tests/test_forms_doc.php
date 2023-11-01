<?php

require_once("../views/forms_doc.php");

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'home', 'menu' => $menu);
// nieuwe instantie (object) van de klasse FormsDoc
$view = new FormsDoc($data);
$view->show();
