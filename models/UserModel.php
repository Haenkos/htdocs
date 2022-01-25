<?php
require_once 'PageModel.php';
require_once 'Util.php';

class UserModel extends PageModel
{
    public $email = '';
    public $name = '';
    public $password = '';
    private $userID = '';
    public $valid = '';
    public $form = array();

    public function __construct($model)
    {
        PARENT::__construct($model);
    }

    public function doLogin($userName)
    {
        $this->sessionManager->loginUser($userName);
    }

    public function validateLoginForm()
    {
        if ($this->isPost) 
        {
            if(empty($_POST['loginEmail'])) 
            {
                $this->errors['loginEmailError'] = "Please provide email";
            } 
            else 
            {
                $this->email = Util::formatInput($_POST['loginEmail']);

                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
                {
                    $this->errors['loginEmailError'] = "Geen valide e-mail adres";
                }
            }

            if (empty($_POST['loginPassword'])) 
            {
                $this->errors['loginPasswordError'] = "Please provide your password";
            } 
            else 
            {
                $this->password = Util::formatInput($_POST['loginPassword']);
            }

            if (empty($this->errors)) 
            {
                $this->valid = true;
            }
        }
    }

    public function validateContactForm()
    {
        if ($this->isPost)
        {
            if (array_key_exists($_POST['gender'], Util::GENDERS)) {
                if ($_POST['gender'] == Util::GENDERS['geen']) {
                    $this->form['gender'] == "";
                } else {
                    $this->form['gender'] = $_POST['gender'];
                }
            } else {
                $this->errors['genderError'] = "Kies aanhef"; 
            }
        
            if (isset($_POST["name"])) {
                $this->form['name'] = Util::formatInput($_POST["name"]);
    
                if (empty($this->form['name'])) {
                    $this->errors['nameError'] = "Naam invullen a.u.b."; 
                }
            } else {
                $this->errors['nameError'] = "Naam invullen a.u.b.";
                
            }
        
            if (empty($_POST["email"])) {
                $this->errors['emailError'] = "Email invullen a.u.b.";
            } else {
                $this->form['email'] = Util::formatInput($_POST["email"]);
        
                if (!filter_var($this->form['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->errors['emailError'] = "Geen valide e-mail adres"; 
                }
            }
        
            if (empty($_POST["phone"])) {
                $this->errors['phoneError'] = "Telefoonnummer invullen a.u.b.";
            } else {
                $this->form['phone'] = Util::formatInput($_POST["phone"]);
        
                if (!preg_match("/^[0-9--]*$/",$this->form['phone'])) {
                    $this->errors['phoneError'] = "alleen cijfers en '-' gebruiken a.u.b.";
                }
            }
        
            if (isset($_POST["compref"]) && array_key_exists($_POST["compref"], Util::COMPREFS)) {
                $this->form['compref'] = Util::formatInput($_POST["compref"]); 
            } else {
                $this->errors['comprefError'] = "Geef a.u.b. aan of u liever gebeld of gemaild wil worden.";
            }
        
            if (empty($_POST["message"])) {
                $this->errors['messageError'] = "Typ a.u.b. een bericht, lege berichten worden genegeerd.";
            } else {
                $this->form['message'] = Util::formatInput($_POST["message"]); 
            }
        
            if (empty($this->errors)) {
            $this->valid = true;
            }
        }
    }
}
