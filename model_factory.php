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
        }

        // Create a new model
        // hier wat toegevoegd: hier staat met de input 'new PageModel', maar pagemodel heeft ook input nodig
        // in $crud zit een nieuwe instantie van crud
        $model = new ($name . "Model")($this->lastModel, $crud);

        // Store the link to the last created model
        $this->lastModel = $model;

        return $model;
    }

    public function getLastModel()
    {
        return $this->lastModel;
    }
}
