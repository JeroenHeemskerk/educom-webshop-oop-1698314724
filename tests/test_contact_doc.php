<?php

require_once("../views/contact_doc.php");

// nieuwe instantie (object) van de klasse BasicDoc
$view = new ContactDoc($myData);
$view->show();
