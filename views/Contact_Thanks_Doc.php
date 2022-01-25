<?php

require_once 'Basic_Doc.php';

class ContactThanksDoc extends BasicDoc
{
    public function __construct($model)
    {
        PARENT::__construct($model);
    }

    final function mainContent()
    {
        echo '<p>Bedankt voor uw reactie!</p>
        

        <div>Naam: '.$this->model->form['name'].'</div>
        <div>Email: '.$this->model->form['email'].'</div>
        <div>Nummer: '.$this->model->form['phone'].'</div>
        <div>Bericht: '.$this->model->form['message'].'</div>';
    }
}