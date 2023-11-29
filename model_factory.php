<?php

require_once("models/user_model.php");
require_once("models/shop_model.php");
require_once("models/page_model.php");
require_once("models/ajax_model.php");

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
        // want ik heb geen 'pagecrud.'
        if ($name == "Ajax") {
            $crud = $this->crudFactory->createCrud("rating");
            $model = new AjaxModel($crud);
        } else if ($name != "Page") {
            $crud = $this->crudFactory->createCrud($name);
            $model = new ($name . "Model")($this->lastModel, $crud);
        } else {
            $model = new ($name . "Model")(null);
        }

        $this->lastModel = $model;

        return $model;
        // de inhoud van deze return gaat terug in $model in de pagecontroller.
    }

    public function getLastModel()
    {
        return $this->lastModel;
    }
}
