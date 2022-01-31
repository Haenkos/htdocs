<?php

require_once 'Basic_Doc.php';

class ErrorDoc extends BasicDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    protected function mainContent()
    {
        echo '<div>';
        echo '<p>'.$this->model->errors['generalError'].'</p>';
        echo '</div>';
    }
}