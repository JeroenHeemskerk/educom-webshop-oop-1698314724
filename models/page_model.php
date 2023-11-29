<?php

class PageModel
{
    public $page;
    public $isPost;
    public $menu = [];
    public $errors = [];
    public $genericErr = "";
    public $genericMessage = "";
    public $sessionManager;

    public function __construct($copy)
    {
        //deze constructor functie gaat aangeroepen worden door user_model. 
        //daarom ook deze if statement. In copy komt dan een object (dan is hij dus niet leeg).
        //Om about en home werkend te krijgen heb ik de else niet nodig (dat deel wordt niet aangeroepen).
        if (empty($copy)) {
            //er wordt NULL doorgegeven vanuit de page controller constructor functie, dus empty=true
            // => first instance of pagemodel
            require_once('session-manager.php');
            $this->sessionManager = new SessionManager();
        } else {
            //=> called from the constructor of an extended class (pagemodel of shopmodel)
            $this->page = $copy->page;
            $this->isPost = $copy->isPost;
            $this->menu = $copy->menu;
            $this->genericErr = $copy->genericErr;
            $this->sessionManager = $copy->sessionManager;
        }
    }


    public function getRequestedPage()
    {
        $this->isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
        //in isPost zit true of false
        require_once('util.php');
        if ($this->isPost) {
            $this->setPage(Util::getPostVar("page", "home"));
        } else {
            $this->setPage(Util::getUrlVar("page", "home"));
        }
    }


    public function setPage($newPage)
    {
        // deze functie stopt iets in page
        //in (new)page zit óf default 'home' of de value van page (een andere pagina). 
        $this->page = $newPage;
    }

    public function createMenu()
    {
        require_once("menu-item.php");

        $this->menu['home'] = new MenuItem('home', 'HOME');
        $this->menu['about'] = new MenuItem('about', 'ABOUT');
        $this->menu['contact'] = new MenuItem('contact', 'CONTACT');
        $this->menu['webshop'] = new MenuItem('webshop', 'WEBSHOP');

        if ($this->sessionManager->isUserLoggedIn()) {
            $this->menu['shoppingcart'] = new MenuItem('shoppingcart', 'SHOPPING CART');
            $this->menu['logout'] = new MenuItem(
                'logout',
                'LOGOUT ' .
                    $this->sessionManager->getLoggedInUserName()
            );
        } else {
            $this->menu['login'] = new MenuItem('login', 'LOGIN');
            $this->menu['register'] = new MenuItem('register', 'REGISTER');
        }
    }
}
