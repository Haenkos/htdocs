<?php
    require_once 'models/SessionManager.php';
    require_once 'Util.php';
    require_once 'views/MenuItem.php';

class PageModel
{

    public $page;
    protected $isPost = false;
    public $menu;
    public $errors = array();
    protected $sessionManager;

    public function __construct($copy)
    {
        if(!empty($copy))
        {
            $this->page = $copy->page;
            $this->isPost = $copy->isPost;
            $this->menu = $copy->menu;
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
    }
}