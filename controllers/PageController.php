<?php
    require_once 'models/PageModel.php';
    require_once 'tools/debug.php';

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
                $this->model->createMenu();
                $view = new HomeDoc($this->model);
                $view->show();
                break;
            case 'register':
                require_once 'UserController.php';
                $controller = new UserController($this->model);
                $controller->registerUser();
                break;
            case 'webshop':
                require_once 'ShopController.php';
                $controller = new ShopController($this->model);
                $controller->showWebshop();
                break;
            case 'productPage':
                require_once 'ShopController.php';
                $controller = new ShopController($this->model);
                $controller->showProductPage();
                break;
            case 'cart':
                try
                {
                    require_once 'ShopController.php';
                    $controller = new ShopController($this->model);
                    $controller->showCart();
                    break;
                }
                catch (Exception $e)
                {
                    if ($e->getMessage() == 'noLoggedInUser')
                    {
                        require_once 'controllers/UserController.php';
                        $controller = new UserController($this->model);
                        $controller->logInUser();
                        break;
                    } 
                    else 
                    {
                        $this->model->errors['generalError'] = $e->getMessage();
                        require_once 'views/Error_Doc.php';
                        $view = new ErrorDoc($this->model);
                        $view->show();
                        break;
                    }
                }
        }
    }
}