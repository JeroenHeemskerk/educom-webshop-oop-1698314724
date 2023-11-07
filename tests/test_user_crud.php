<?php

require_once("../crud.php");
require_once("../user_crud.php");

$crud = new Crud();
$userCrud = new UserCrud($crud);

$user = $userCrud->readUserByEmail('jan@hotmail.com');
$test = $userCrud->createUser('lina@hotmail.com', 'Lina', 'lina123');

var_dump($user->name);
var_dump($test);
// dit werkt! ik krijg nu de user Id terug.
