<?php
    require_once 'models/PageModel.php';

class PageController
{
    private $model;

    public function __construct()
    {
        $this->model = new PageModel(NULL);


    }

    public function handleRequest() 
    {
        $this->model->getRequestedPage();
        $this->model->createMenu();

        switch ($this->model->page)
        {
            case 'home':
                require_once 'views/Home_Doc.php';
                $view = new HomeDoc($this->model);
                $view->show();
                break;
            case 'about':
                require_once 'views/About_Doc.php';
                $view = new AboutDoc($this->model);
                $view->show();
                break;
            case 'contact':
                require_once 'UserController.php';
                $controller = new UserController($this->model);
                $controller->contact();
                break;
            case 'login':
                require_once 'UserController.php';
                $controller = new UserController($this->model);
                $controller -> logInUser();
                break;
            case 'logout':
                require_once 'views/Home_Doc.php';
                require_once 'UserController.php';
                $controller = new UserController($this->model);
                $controller -> logOutUser();
                $view = new HomeDoc($this->model);
                $view->show();
            case 'register':
                require_once 'UserController.php';
                $controller = new UserController($this->model);
                $controller->registerUser();
                break;
            case 'webshop':
                require_once 'ShopController.php';
                require_once 'views/Webshop_Doc.php';
                $controller = new ShopController($this->model);
                $controller->getProductList();
                $controller->showWebshop();
                break;
            case 'productPage':
                require_once 'ShopController.php';
                require_once 'views/Product_Page_Doc.php';
                $controller = new ShopController($this->model);
                $controller->showProductPage();
                break;
        }
    }
}