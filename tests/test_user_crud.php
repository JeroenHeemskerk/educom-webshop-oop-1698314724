<?php

require_once("../crud.php");
require_once("../user_crud.php");

$crud = new Crud();
$userCrud = new UserCrud($crud);

$user = $userCrud->readUserByEmail('jan@hotmail.com');

var_dump($user->name);
