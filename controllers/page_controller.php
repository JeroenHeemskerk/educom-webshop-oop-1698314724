<?php

require_once('models/page_model.php');
class PageController
{
    //hier zit het object pagemodel in
    private $model;


    public function __construct()
    {
        $this->model = new PageModel(NULL);
    }

    public function handleRequest()
    {
        $this->getRequest();
        // $this->processRequest();
        $this->showResponse();
    }

    //from client (user)
    private function getRequest()
    {
        //deze functie ga ik dus uit PageModel halen
        // in model zit een instantie van pagemodel (object)
        $this->model->getRequestedPage();
    }

    //business flow code:
    // private function processRequest()
    // {
    //     switch ($this->model->page) {
    //         case 'login':
    //             $this->model = new UserModel($this->model);
    //             $this->model->validateLogin();
    //             if ($this->model->valid) {
    //                 $this->model->doLoginUser();
    //                 $this->model->setPage("home");
    //             }
    //             break;
    //             //andere switch cases komen hier
    //     }
    // }


    //dit gaat naar de client toe -> UI laag
    private function showResponse()
    {
        $this->model->createMenu();

        switch ($this->model->page) {
            case 'home':
                require_once('views/home_doc.php');
                $view = new HomeDoc($this->model);
                break;
            case 'about':
                require_once('views/about_doc.php');
                $view = new AboutDoc($this->model);
                break;
            case 'contact':
                require_once('views/contact_doc.php');
                $view = new ContactDoc($this->model);
                break;
            case 'register':
                require_once('views/register_doc.php');
                $view = new RegisterDoc($this->model);
                break;
            case 'login':
                require_once('views/login_doc.php');
                $view = new LoginDoc($this->model);
                break;
            case 'webshop':
                require_once('views/webshop_doc.php');
                $view = new WebshopDoc($this->model);
                break;
            case 'product':
                require_once('views/product_doc.php');
                $view = new ProductDoc($this->model);
                break;
            case 'shoppingcart':
                require_once('views/shoppingcart_doc.php');
                $view = new ShoppingcartDoc($this->model);
                break;
        }
        $view->show();
    }
}
