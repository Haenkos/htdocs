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
        require_once 'login.php';

        showLoginForm($this->data);
    }
}