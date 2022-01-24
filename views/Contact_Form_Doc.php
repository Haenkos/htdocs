<?php
require_once 'Forms_Doc.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\services\validations.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\tools\debug.php';

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
        if($this->model->page == 'thanks') { //TODO: Make 'thanks' its own class
            $this->showThanks();
        }
        else
        {
            $this->showForm();
        }
    }

    private function showForm()
    {
        //TODO: fix no error showing for comprefs --> likely typo on line 46

        echo "<div class='contact_form'>";
        $this->formStart('/index.php', 'post');
        $this->hiddenInput('page', 'contact');
        $this->dropDownMenu('gender', GENDERS, getArrayVar($this->model['errors'], 'genderError'));

        echo "Naam: "; //TODO: see if good idea to put this in
        $this->textInput('name', getArrayVar($this->model, 'name'), getArrayVar($this->model['errors'], 'nameError')); //TODO: textInput function has access to $this->model so you can make function body get value and nameError instead of manually passing it to the function.

        echo "Email: ";
        $this->textInput('email', getArrayVar($this->model, 'email'), getArrayVar($this->model['errors'], 'emailError'));

        echo "Telefoon: ";
        $this->textInput('phone', getArrayVar($this->model, 'phone'), getArrayVar($this->model['errors'], 'phoneError'));

        echo "<div class='radiobuttons'>";
        echo "<div>Heeft email of telefoon je voorkeur?</div>";
        $this->radioButtonGroup('compref', COMPREFS, getArrayVar($this->model['errors'], 'comprefErro'));
        echo "</div>";

        echo "Bericht: ";
        $this->textArea('message', getArrayVar($this->model, 'message'), getArrayVar($this->model['errors'], 'messageError'), 'Typ hier je bericht...');

        $this->submitButton();

        $this->formEnd();

        echo "</div>";

        debugData($this->model);
    }

    private function showThanks()
    {
        echo "<p>Bedankt voor uw bericht, we nemen zo snel mogelijk (binnen 6-8 weken) contact met u op.</p>";

        echo "Naam: ". getArrayVar($this->model, 'name');
        echo "<br>Email: ". getArrayVar($this->model, 'email');
        echo "<br>Telefoon: ". getArrayVar($this->model, 'phone');
        echo "<br>Voorkeur: ". getArrayVar($this->model, 'compref');
        echo "<br>Bericht:<br>";
        echo getArrayVar($this->model, 'message');

    }
}