<?php
require_once 'PageController.php';
require_once 'models/UserModel.php';

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
            require_once 'views/Contact_Thanks_Doc.php';
            $view = new ContactThanksDoc($this->model);
            $view->show();
        } 
        else
        {
            require_once 'views/Contact_Form_Doc.php';
            $view = new ContactFormDoc($this->model);
            $view->show();
        }
    }

    public function logInUser()
    {
        $this->model->validateLoginForm();

        if($this->model->valid)
        {
            try {
                $this->model->doLogin();
                
                require_once 'views/Home_Doc.php';
                $view = new HomeDoc($this->model);
                $view->show();
            } catch (exception $e) {
                $this->model->errors['loginError'] = $e->getMessage();
                require_once 'views/Login_Form_Doc.php';
                $view = new LoginFormDoc($this->model);
                $view->show();
            }
        }
        else
        {
            require_once 'views/Login_Form_Doc.php';
            $view = new LoginFormDoc($this->model);
            $view->show();
        }
    }

    public function logoutUser() {
        $this->model->doLogout();
    }

    public function registerUser()
    {
        $this->model->validateRegistrationForm();

        if($this->model->valid)
        {
            try {
                $this->model->doRegister();

                require_once 'views/Login_Form_Doc.php';
                $view = new LoginFormDoc($this->model);
                $view->show();
            } catch (exception $e) {
                $this->model->errors['registerError'] = $e->getMessage();
                
                require_once 'views/Register_Form_Doc.php';
                $view = new RegisterFormDoc($this->model);
                $view->show();
            }
        } else {
            require_once 'views/Register_Form_Doc.php';
            $view = new RegisterFormDoc($this->model);
            $view->show();
        }
    }
}