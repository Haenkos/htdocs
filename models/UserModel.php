<?php
require 'PageModel.php';
require 'Util.php';

class UserModel extends PageModel
{
    public $email = '';
    public $name = '';
    public $password = '';
    private $userID = '';
    public $valid = '';
    public $contact = array();

    public function __construct($model)
    {
        PARENT::__construct($model);
    }

    public function validateContactForm()
    {
        if (empty($this->contact))
        {
            return;
        }

        if (array_key_exists($_POST['gender'], Util::GENDERS)) {
            if ($_POST['gender'] == Util::GENDERS['geen']) {
                $this->contact['gender'] == "";
            } else {
                $this->contact['gender'] = $_POST['gender'];
            }
        } else {
            $this->errors['genderError'] = "Kies aanhef"; 
        }
    
        if (isset($_POST["name"])) {
            $this->contact['name'] = formatInput($_POST["name"]);

            if (empty($data['name'])) {
                $this->errors['nameError'] = "Naam invullen a.u.b."; 
            }
        } else {
            $this->errors['nameError'] = "Naam invullen a.u.b.";
            
        }
    
        if (empty($_POST["email"])) {
            $this->errors['emailError'] = "Email invullen a.u.b.";
        } else {
            $this->contact['email'] = formatInput($_POST["email"]);
    
            if (!filter_var($this->contact['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['emailError'] = "Geen valide e-mail adres"; 
            }
        }
    
        if (empty($_POST["phone"])) {
            $this->error['phoneError'] = "Telefoonnummer invullen a.u.b.";
        } else {
            $this->contact['phone'] = formatInput($_POST["phone"]);
    
            if (!preg_match("/^[0-9--]*$/",$this->contact['phone'])) {
                $this->errors['phoneError'] = "alleen cijfers en '-' gebruiken a.u.b.";
            }
        }
    
        if (isset($_POST["compref"]) && array_key_exists($_POST["compref"], COMPREFS)) {
            $this->contact['compref'] = formatInput($_POST["compref"]); 
        } else {
            $this->errors['comprefError'] = "Geef a.u.b. aan of u liever gebeld of gemaild wil worden.";
        }
    
        if (empty($_POST["message"])) {
            $this->errors['messageError'] = "Typ a.u.b. een bericht, lege berichten worden genegeerd.";
        } else {
            $this->contact['message'] = formatInput($_POST["message"]); 
        }
    
        if (empty($this->errors)) {
            $this->valid = true;
        }
    }
}

