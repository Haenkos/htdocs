<?php
require_once 'PageModel.php';
require_once 'Util.php';
require_once 'io/database_acces_layer.php';

class UserModel extends PageModel
{
    public $email = '';
    public $name = '';
    public $password = '';
    public $checkPassword = '';
    private $userID = '';
    public $valid = '';
    public $form = array();

    public function __construct($model)
    {
        PARENT::__construct($model);
    }

    public function doLogin()
    {
        $this->userAuthentication();
        
        $this->sessionManager->loginUser($this->name, $this->userID);

    }

    public function doLogout()
    {
        $this->sessionManager->logOutUser();
    }

    public function doRegister()
    {
            storeUser($this->form['name'], $this->form['email'], $this->form['password']);
    }

    private function userAuthentication() 
    {
        $user = getUser($this->form['email']);
        
        if (strcmp($this->form['password'], $user["userPassword"]) != 0) {
            throw new Exception("Wrong Password");
        } else {
            $this->userID = $user['userID'];
            $this->name = $user['userName'];
        }
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
                $this->form['email'] = Util::formatInput($_POST['loginEmail']);

                if (!filter_var($this->form['email'], FILTER_VALIDATE_EMAIL)) 
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
                $this->form['password'] = Util::formatInput($_POST['loginPassword']);
            }

            if (empty($this->errors)) 
            {
                $this->valid = true;
            }
        }
    }

    public function validateRegistrationForm()
    {
        if ($this->isPost) 
        {
            if(isset($_POST['name'])) 
            {
                $this->form['name'] = Util::formatInput($_POST['name']);

                if(empty($this->form['name'])) {
                    $this->errors['nameError'] = "Username cannot be empty";
                }

            } else {
                $this->errors['nameError'] = "Please choose a username";
            }

            if(empty($_POST['email'])) {
                $this->errors['emailError'] = "Please provide email";
            } else {
                $this->form['email'] = Util::formatInput($_POST['userEmail']);

                if (!filter_var($this->form['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->errors['emailError'] = "Geen valide e-mail adres"; 
                }
            }

            if(empty($_POST['password'])) {
                $this->errors['passwordError'] = "Please Choose a password";
            } else {
                $this->form['password'] = Util::formatInput($_POST['password']);

                if (strlen($this->form['password']) < 8) {
                    $this->errors['passwordError'] = "Password must be 8 or more characters"; 
                }
            }

            if(!empty($this->form['password'])) {
                if(empty($_POST['checkPassword'])) {
                    $this->errors['checkPasswordError'] = "Please retype password";
                } else {
                    $this->form['checkPassword'] = Util::formatInput($_POST['checkPassword']);

                    if (strcmp($this->form['password'], $this->form['checkPassword']) !== 0) {
                        $this->errors['checkPasswordError'] = "Passwords do not match";
                    }
                }
            }

            if (empty($this->errors)) {
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
