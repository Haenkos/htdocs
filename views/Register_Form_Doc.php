<?php

require_once 'Forms_Doc.php';

class RegisterFormDoc extends FormsDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    final function mainContent()
    {
       $this->showRegistrationForm();
    }
    
    private function showRegistrationForm()
    {
        echo "<div class='registration_form'>";
        echo Util::getArrayVar($this->model->errors, 'registerError');
        $this->formStart('/index.php', 'post');
        $this->hiddenInput('page', 'registration');

        echo "Username: ";
        $this->textInput('name', Util::getArrayVar($this->model->form, 'name'), Util::getArrayVar($this->model->errors, 'nameError'));
        
        echo "Email: ";
        $this->textInput('email', Util::getArrayVar($this->model->form, 'email'), Util::getArrayVar($this->model->errors, 'emailError'));

        echo "Password: ";
        $this->textInput('password', Util::getArrayVar($this->model->form, 'password'), Util::getArrayVar($this->model->errors, 'passwordError')); //TODO: make passwordInput function

        echo "Password again: ";
        $this->textInput('checkPassword', Util::getArrayVar($this->model->form, 'checkPassword'), Util::getArrayVar($this->model->errors, 'passwordError')); //TODO: make passwordInput function

        $this->submitButton('Register');
        $this->formEnd();
        echo "</div>";
    }
}