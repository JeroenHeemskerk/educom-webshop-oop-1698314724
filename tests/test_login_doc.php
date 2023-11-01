<?php

require_once("../views/login_doc.php");

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'login', "email" => "", "emailErr" => "", "password" => "", "passwordErr" => "", "valid" => false, 'menu' => $menu);
// nieuwe instantie (object) van de klasse LoginDoc
$view = new LoginDoc($data);
$view->show();
