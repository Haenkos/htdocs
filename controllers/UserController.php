<?php
require_once 'PageController.php';

class UserController extends PageController
{
    private $model;

    public function __construct($model)
    {
        $this->model = new UserModel($model);
    }

    public function contact()
    {
        $this->model->validateContactForm();

        if ($this->model->valid)
        {
            require_once '../views/Contact_Thanks_Doc.php';
            $view = new ContactThanksDoc($this->model);
            $view->show();
        } 
        else
        {
            require_once '../views/Contact_Form_Doc.php';
            $view = new ContactFormDoc($this->model);
            $view->show();
        }
    }
}