<?php
require_once 'Forms_Doc.php';
//require_once 'C:\Bitnami\wampstack-8.1.2-0\apache2\htdocs\tools\debug.php';
require_once 'Util.php';

class ContactFormDoc extends FormsDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
        //define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "geen" => "Anders/geen"));
        //define('COMPREFS', array("email" => "email", "phone" => "phone"));
    }

    final function mainContent()
    {
        $this->showForm();
    }

    private function showForm()
    {
        //TODO: fix no error showing for comprefs --> likely typo on line 46

        echo "<div class='contact_form'>";
        $this->formStart('/index.php', 'post');
        $this->hiddenInput('page', 'contact');
        $this->dropDownMenu('gender', Util::GENDERS, Util::getArrayVar($this->model->errors, 'genderError'));

        echo "Naam: "; //TODO: see if good idea to put this in
        $this->textInput('name', Util::getArrayVar($this->model->form, 'name'), Util::getArrayVar($this->model->errors, 'nameError')); //TODO: textInput function has access to $this->model so you can make function body get value and nameError instead of manually passing it to the function.

        echo "Email: ";
        $this->textInput('email', Util::getArrayVar($this->model->form, 'email'), Util::getArrayVar($this->model->errors, 'emailError'));

        echo "Telefoon: ";
        $this->textInput('phone', Util::getArrayVar($this->model->form, 'phone'), Util::getArrayVar($this->model->errors, 'phoneError'));

        echo "<div class='radiobuttons'>";
        echo "<div>Heeft email of telefoon je voorkeur?</div>";
        $this->radioButtonGroup('compref', Util::COMPREFS, Util::getArrayVar($this->model->errors, 'comprefError'));
        echo "</div>";

        echo "Bericht: ";
        $this->textArea('message', Util::getArrayVar($this->model->form, 'message'), Util::getArrayVar($this->model->errors, 'messageError'), 'Typ hier je bericht...');

        $this->submitButton();

        $this->formEnd();

        echo "</div>";
    }
}