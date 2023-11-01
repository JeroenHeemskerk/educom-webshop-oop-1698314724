<?php

require_once("../views/basic_doc.php");

// nieuwe instantie (object) van de klasse BasicDoc
$view = new BasicDoc($data);
// uitvoer van de publieke functie show

$data = array('page' => 'basic', /* other fields */);
$view->$view->show();
