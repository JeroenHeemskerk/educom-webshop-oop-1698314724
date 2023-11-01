<?php

require_once("../views/productserver_doc.php");

$data = array('page' => 'about');
// nieuwe instantie (object) van de klasse BasicDoc
$view = new ProductServer($data);
// uitvoer van de publieke functie show
$view->show();
// $test->showHeader($pageTitle);
