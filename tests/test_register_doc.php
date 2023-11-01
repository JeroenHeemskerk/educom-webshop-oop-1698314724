<?php

require_once("../views/register_doc.php");

// nieuwe instantie (object) van de klasse BasicDoc
$view = new RegisterDoc($myData);
$view->show();
