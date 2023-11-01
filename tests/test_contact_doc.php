<?php

require_once("../views/contact_doc.php");

$menu = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
$data = array("page" => "contact", "salutation" => " ", "name" => "", "email" => "", "phonenumber" => "", "comm_preference" => "", "message" => "", "salutationErr" => "", "nameErr" => "", "emailErr" => "", "phonenumberErr" => "", "comm_preferenceErr" => "", "messageErr" => "", "valid" => false, 'menu' => $menu);
// nieuwe instantie (object) van de klasse BasicDoc
$view = new ContactDoc($data);
$view->show();
