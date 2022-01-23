<?php
require_once 'Forms_Doc.php';

class LoginFormDoc extends FormsDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    final function mainContent()
    {
       $this->showLoginForm();
    }

    private function showLoginForm()
    {
        echo "<div class='login_form'>";
        $this->formStart('/index.php', 'post');
        $this->hiddenInput('page', 'login');

        echo "Email: ";
        $this->textInput('loginEmail', getArrayVar($this->data, 'loginEmail'), getArrayVar($this->data['errors'], 'loginEmailError'));

        echo "Password: ";
        $this->textInput('loginPassword', getArrayVar($this->data, 'loginPassword'), getArrayVar($this->data['errors'], 'loginPasswordError')); //TODO: make passwordInput function (see Forms_Doc.php)

        $this->submitButton('login');
        $this->formEnd();
        echo "</div>";
    }
}