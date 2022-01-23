<?php
require_once 'Forms_Doc.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\services\validations.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\tools\debug.php';

class ContactFormDoc extends FormsDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
        //define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "geen" => "Anders/geen"));
        //define('COMPREFS', array("email" => "email", "phone" => "phone"));
    }

    final function mainContent()
    {
        if($this->data['page'] == 'thanks') { //TODO: Make 'thanks' its own class
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
        $this->dropDownMenu('gender', GENDERS, getArrayVar($this->data['errors'], 'genderError'));

        echo "Naam: "; //TODO: see if good idea to put this in
        $this->textInput('name', getArrayVar($this->data, 'name'), getArrayVar($this->data['errors'], 'nameError')); //TODO: textInput function has access to $this->data so you can make function body get value and nameError instead of manually passing it to the function.

        echo "Email: ";
        $this->textInput('email', getArrayVar($this->data, 'email'), getArrayVar($this->data['errors'], 'emailError'));

        echo "Telefoon: ";
        $this->textInput('phone', getArrayVar($this->data, 'phone'), getArrayVar($this->data['errors'], 'phoneError'));

        echo "<div class='radiobuttons'>";
        echo "<div>Heeft email of telefoon je voorkeur?</div>";
        $this->radioButtonGroup('compref', COMPREFS, getArrayVar($this->data['errors'], 'comprefErro'));
        echo "</div>";

        echo "Bericht: ";
        $this->textArea('message', getArrayVar($this->data, 'message'), getArrayVar($this->data['errors'], 'messageError'), 'Typ hier je bericht...');

        $this->submitButton();

        $this->formEnd();

        echo "</div>";

        debugData($this->data);
    }

    private function showThanks()
    {
        echo "<p>Bedankt voor uw bericht, we nemen zo snel mogelijk (binnen 6-8 weken) contact met u op.</p>";

        echo "Naam: ". getArrayVar($this->data, 'name');
        echo "<br>Email: ". getArrayVar($this->data, 'email');
        echo "<br>Telefoon: ". getArrayVar($this->data, 'phone');
        echo "<br>Voorkeur: ". getArrayVar($this->data, 'compref');
        echo "<br>Bericht:<br>";
        echo getArrayVar($this->data, 'message');

    }
}