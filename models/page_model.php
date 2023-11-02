<?php

class PageModel
{

    public $page;
    protected $isPost;
    public $menu;
    public $errors = array();
    public $genericErr = "";
    protected $sessionManager;


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
            //=> called from the constructor of an extended classs
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


    protected function setPage($newPage)
    {
        // deze functie stopt iets in page
        //in (new)page zit óf default 'home' of de value van page (een andere pagina). 
        $this->page = $newPage;
    }



    public function createMenu()
    {
        $this->menu['home'] = [];
        //new MenuItem('home', 'HOME');
        // $this->menu['about'] = new MenuItem('about', 'ABOUT');
        // $this->menu['contact'] = new MenuItem('contact', 'CONTACT');
        // $this->menu['webshop'] = new MenuItem('webshop', 'WEBSHOP');

        // if ($this->sessionManager->isUserLoggedIn()) {
        //     $this->menu['logout'] = new MenuItem(
        //         'logout',
        //         'LOGOUT',
        //         $this->sessionManager->getLoggedInUser()['name']
        //     );
        // }
    }
}
