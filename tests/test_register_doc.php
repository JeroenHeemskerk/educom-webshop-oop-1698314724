<?php

require_once("../views/register_doc.php");

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array('page' => 'register', "name" => "", "email" => "", "password" => "", "repeatedPassword" => "", "nameErr" => "", "emailErr" => "", "passwordErr" => "", "repeatedPasswordErr" => "", "valid" => false, 'menu' => $menu);
// nieuwe instantie (object) van de klasse BasicDoc
$view = new RegisterDoc($data);
$view->show();
