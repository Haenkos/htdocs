<?php

require_once 'Basic_Doc.php';

class ContactThanksDoc extends BasicDoc
{
    public function __construct($model)
    {
        PARENT::__construct($model);
    }

    public function show()
    {
        echo '<p>Bedankt voor uw reactie!</p>
        

        <div>Naam: '.$this->contact['name'].'</div>
        <div>Email: '.$this->contact['email'].'</div>
        <div>Nummer: '.$this->contact['phone'].'</div>
        <div>Bericht: '.$this->contact['message'].'</div>';
    }
}