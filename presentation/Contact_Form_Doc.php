<?php
require_once 'Forms_Doc.php';

class ContactFormDoc extends FormsDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    final function mainContent()
    {
        require_once 'contact.php';
        if ($this->data['page'] == 'thanks')
        {
            showContactThanks($this->data);
        }
        else
        {
            showContactForm($this->data);
        }
    }
}