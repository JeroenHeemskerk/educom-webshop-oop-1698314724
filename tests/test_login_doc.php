<?php

require_once("../views/login_doc.php");

// nieuwe instantie (object) van de klasse BasicDoc
$view = new LoginDoc($myData);
$view->show();
