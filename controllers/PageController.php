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
                require_once 'views/Contact_Form_Doc.php';
                $view = new ContactFormDoc($this->model);
                $view->show();
                break;
        }
    }
}