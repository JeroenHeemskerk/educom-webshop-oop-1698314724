<?php

require_once('models/page_model.php');
class PageController
{
    //hier zit het object pagemodel in
    private $model;
    private $modelFactory;
    private $pageModel;
    public $crud;


    public function __construct(ModelFactory $modelFactory)
    {
        $this->model = new PageModel(NULL);
        $this->modelFactory = $modelFactory;

        $this->pageModel = $modelFactory->createModel("Page");

        //Ik laat hier een PageModel creeren door de Modelfactory (createmodel)
    }

    public function handleRequest()
    {
        $this->getRequest();
        $this->processRequest();
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
    private function processRequest()
    {
        switch ($this->model->page) {
            case 'login':
                require_once('models/user_model.php');
                $this->model = $this->modelFactory->createModel("User");
                // ik ga hier nu aan de ModelFactory vragen om een model met naam "User"
                // $this->model = new UserModel($this->model);
                if ($this->model->isPost) {
                    $this->model->validateLogin();
                    if ($this->model->valid) {
                        $this->model->doLoginUser();
                        $this->model->setPage("home");
                    }
                }
                break;
            case 'register':
                require_once('models/user_model.php');
                $this->model = $this->modelFactory->createModel("User");
                // $this->model = new UserModel($this->model);
                if ($this->model->isPost) {
                    $this->model->registerUser();
                    if ($this->model->valid) {
                        $this->model->setPage("login");
                    }
                }
                break;
            case 'contact':
                require_once('models/user_model.php');
                $this->model = $this->modelFactory->createModel("User");
                // $this->model = new UserModel($this->model);
                if ($this->model->isPost) {
                    $this->model->validateContact();
                }
                break;
            case 'webshop':
                require_once('models/shop_model.php');
                $this->model = $this->modelFactory->createModel("Shop");
                // ik ga hier nu aan de ModelFactory vragen om een model met naam "Shop"
                // $this->model = new ShopModel($this->model);
                $this->model->handleActions();
                $this->model->getWebshopData();
                break;
            case 'product':
                require_once('models/shop_model.php');
                $this->model = $this->modelFactory->createModel("Shop");
                // $this->model = new ShopModel($this->model);
                $this->model->handleActions();
                $this->model->getProductData();
                break;
            case 'shoppingcart':
                require_once('models/shop_model.php');
                $this->model = $this->modelFactory->createModel("Shop");
                // $this->model = new ShopModel($this->model);
                $this->model->handleActions();
                $this->model->getShoppingcartData();
                break;
            case 'logout':
                require_once('models/user_model.php');
                $this->model = new UserModel($this->model);
                $this->model->sessionManager->doLogOut();
                $this->model->setPage("home");
                break;
        }
    }


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
            default:
                require_once('views/not_found_doc.php');
                $view = new NotFoundDoc($this->model);
        }
        $view->show();
    }
}
