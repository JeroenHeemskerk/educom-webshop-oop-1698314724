<?php

require_once("models/user_model.php");
require_once("models/shop_model.php");
require_once("models/page_model.php");

class ModelFactory
{

    public $crudFactory;
    private $lastModel = null;

    // hier zit het laatst gemaakte model in

    public function __construct(CrudFactory $crudFactory)
    {
        $this->crudFactory = $crudFactory;
    }

    public function createModel($name)
    {
        // als name is niet page, maak dan een crud aan
        if ($name != "Page") {
            $crud = $this->crudFactory->createCrud($name);
            $model = new ($name . "Model")($this->lastModel, $crud);
        } else {
            $model = new ($name . "Model")(null);
        }

        $this->lastModel = $model;

        return $model;
    }

    public function getLastModel()
    {
        return $this->lastModel;
    }
}
