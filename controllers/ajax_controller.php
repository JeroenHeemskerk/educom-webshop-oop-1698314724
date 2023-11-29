<?php

class AjaxController
{

    private $model;
    private $modelFactory;

    public function __construct(ModelFactory $modelFactory)
    {
        $this->modelFactory = $modelFactory;
        $this->model = $this->modelFactory->createModel("Ajax");
    }

    public function handleRequest()
    {
        $this->getFunction();
        $this->processRequest();
        $this->sendResponse();
    }

    private function getFunction()
    {
        require_once("util.php");
        $function = Util::getUrlVar('function');
        // in function zit óf een lege string of de waarde van de key 'function.'
        // bijvoorbeeld: getRating

        require_once('validators.php');
        if (Validators::validateAjaxFunction($function)) {
            //als functienaam toestaan is (en dus bestaat) dan:
            $this->model->function = $function;
            // sla functienaam op in instantie van ajax_model
        }
    }

    private function processRequest()
    {
        if (isset($this->model->function)) {
            $this->model->executeAjaxFunction();
        }
    }

    private function sendResponse()
    {
        require_once('views/ajax_doc.php');
        $view = new AjaxDoc($this->model);

        $view->sendResponse();
    }


    //welke CRUD functie ik moet uitvoeren ga ik ook uit de URL halen
    // en ook de variabelen

    // soms komt er een post body mee
}
