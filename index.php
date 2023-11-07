<?php

require_once('controllers/page_controller.php');
require_once('model_factory.php');
require_once('crud.php');

$crud = new Crud();
$crudFactory = new CrudFactory($crud);
$modelFactory = new ModelFactory($crudFactory);
$controller = new PageController($modelFactory);

$controller->handleRequest();


//ik maak eerst een generieke Crud klasse. Die geef ik mee aan de Crudfactory 
// het enige wat de CrudFactory kan is de juiste Crud maken (user of shop).
// de ModelFactory wordt dan doorgegeven aan de pageController. 
// IN de pagecontroller roep ik de createModel functie van de ModelFactory aan
// die maakt dan een Model (PageModel, ShopModel of UserModel). 