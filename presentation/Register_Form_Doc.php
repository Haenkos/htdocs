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

        showRegistrationForm($this->data);
    }
}