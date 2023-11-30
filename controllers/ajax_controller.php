<?php

class AjaxController
{

    private $model;
    private $modelFactory;


    public function __construct(ModelFactory $modelFactory, SessionManager $sessionManager)
    {
        $this->modelFactory = $modelFactory;
        $this->model = $this->modelFactory->createModel("Ajax");
        $this->model->userId = $sessionManager->getLoggedInUserId();;
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
            // omdat mensen zelf vanalles in de adresbalk kunnen typen, moet ik het valideren
            //als functienaam toegestaan is (en dus bestaat) dan:
            $this->model->function = $function;
            // sla functienaam op in instantie van ajax_model (in variabele $function)
        }
    }

    private function processRequest()
    {
        if (isset($this->model->function)) {
            $this->model->executeAjaxFunction();
            //hier roep ik via ajax_model de juiste functie aan
        }
    }

    private function sendResponse()
    {
        require_once('views/ajax_doc.php');
        $view = new AjaxDoc($this->model);

        $view->sendResponse();
        // ik echo nu de juiste data in JSON notatie. 
    }
}
