<?php

require_once 'Forms_Doc.php';

class RegisterFormDoc extends FormsDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    final function mainContent()
    {
        require_once 'registration.php';

       $this->showRegistrationForm();
    }
    
    private function showRegistrationForm()
    {
        echo "<div class='registration_form'>";
        $this->formStart('/index.php', 'post');
        $this->hiddenInput('page', 'registration');

        echo "Username: ";
        $this->textInput('userName', getArrayVar($this->data, 'userName'), getArrayVar($this->data['errors'], 'userNameError'));
        
        echo "Email: ";
        $this->textInput('userEmail', getArrayVar($this->data, 'userEmail'), getArrayVar($this->data['errors'], 'userEmailError'));

        echo "Password: ";
        $this->textInput('userPassword', getArrayVar($this->data, 'userPassword'), getArrayVar($this->data['errors'], 'userPasswordError'));

        echo "Password again: ";
        $this->textInput('checkPassword', getArrayVar($this->data, 'checkPassword'), getArrayVar($this->data['errors'], 'checkPasswordError'));

        $this->submitButton('Register');
        $this->formEnd();
        echo "</div>";
    }
}