<?php
require_once 'Forms_Doc.php';
require_once 'Util.php';

class LoginFormDoc extends FormsDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    final function mainContent()
    {
       $this->showLoginForm();
    }

    private function showLoginForm()
    {
        echo "<div class='login_form'>";
        echo Util::getArrayVar($this->model->errors, 'loginError');
        $this->formStart('/index.php', 'post');
        $this->hiddenInput('page', 'login');

        echo "Email: ";
        $this->textInput('loginEmail', Util::getArrayVar($this->model->form, 'email'), Util::getArrayVar($this->model->errors, 'loginEmailError'));

        echo "Password: ";
        $this->textInput('loginPassword', Util::getArrayVar($this->model->form, 'password'), Util::getArrayVar($this->model->errors, 'loginPasswordError')); //TODO: make passwordInput function (see Forms_Doc.php)

        $this->submitButton('login');
        $this->formEnd();
        echo "</div>";
    }
}