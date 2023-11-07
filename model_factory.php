<?php

class ModelFactory
{

    public $crudFactory;
    private $lastModel = NULL;

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
        } else {
            $crud = null;
        }

        $model = new ($name . "Model")($this->lastModel, $crud);

        $this->lastModel = $model;

        return $model;
    }

    public function getLastModel()
    {
        return $this->lastModel;
    }
}
