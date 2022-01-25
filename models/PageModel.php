<?php
    require_once 'models/SessionManager.php';
    require_once 'Util.php';
    require_once 'views/MenuItem.php';

class PageModel
{

    public $page;
    protected $isPost = false;
    public $menu;
    public $sessionMenu;
    public $errors = array();
    protected $sessionManager;

    public function __construct($copy)
    {
        if(!empty($copy))
        {
            $this->page = $copy->page;
            $this->isPost = $copy->isPost;
            $this->menu = $copy->menu;
            $this->sessionMenu = $copy->sessionMenu;
            $this->errors = $copy->errors;
            $this->sessionManager = $copy->sessionManager;
        }
        else
        {
            $this->sessionManager = new SessionManager();
        }
    }

    public function getRequestedPage() 
    {  
        $this->isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
        
        
        if ($this->isPost) 
        { 
            $this->page = Util::getPostVar('page','home'); 
        } 
        else 
        { 
            $this->page = Util::getUrlVar('page','home'); 
        }
    }

    public function createMenu()
    {
         $this->menu['home'] = new MenuItem('home', 'Home');
         $this->menu['about'] = new MenuItem('about', 'About');
         $this->menu['contact'] = new MenuItem('contact', 'Contact');
         $this->menu['webshop'] = new MenuItem('webshop', 'Webshop');
         //TODO: add logic for login/logout/registration buttons
         if ($this->sessionManager->isUserLoggedIn())
         {
             $this->sessionMenu['logout'] = new MenuItem('logout', 'Logout '.$this->sessionManager->getLoggedInUser());
         }
         else
         {
             $this->sessionMenu['login'] = new MenuItem('login', 'Login');
             $this->sessionMenu['register'] = new MenuItem('register', 'Register');
         }
         $this->sessionMenu['cart'] = new MenuItem('cart', 'Winkelwagen');
    }
}