<?php

require_once("../views/about_doc.php");

$data = array('page' => 'about');
// nieuwe instantie (object) van de klasse BasicDoc
$view = new AboutDoc($data);
// uitvoer van de publieke functie show
$view->show();
// $test->showHeader($pageTitle);
