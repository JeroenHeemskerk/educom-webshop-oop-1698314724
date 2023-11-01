<?php

require_once("../views/home_doc.php");

$data = array('page' => 'home');
// nieuwe instantie (object) van de klasse BasicDoc
$view = new HomeDoc($myData);
// uitvoer van de publieke functie show
$view->show();
// $test->showHeader($pageTitle);
