<?php
    require_once 'contact.php';

    function formatInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    function validateContactForm() {

        $data = array(
            "gender" => "",
            "name" => "",
            "email" => "",
            "phone" => "",
            "compref" => "",
            "message" => "",
            "valid" => false,
            "errors" => array()
        );

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (array_key_exists($_POST['gender'], GENDERS)) {
                if ($_POST['gender'] == GENDERS['anders/geen']) {
                    $data['gender'] == "";
                } else {
                    $data['gender'] = $_POST['gender'];
                }
            } else {
                $data['errors']['genderError'] = "Kies aanhef"; 
            }
        
            if (isset($_POST["name"])) {
                $data['name'] = formatInput($_POST["name"]);

                if (empty($data['name'])) {
                    $data['errors']['nameError'] = "Naam invullen a.u.b."; 
                }
            } else {
                $data['errors']['nameError'] = "Naam invullen a.u.b.";
                
            }
        
            if (empty($_POST["email"])) {
                $data['errors']['emailError'] = "Email invullen a.u.b.";
            } else {
                $data['email'] = formatInput($_POST["email"]);
        
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['errors']['emailError'] = "Geen valide e-mail adres"; 
                }
            }
        
            if (empty($_POST["phone"])) {
                $data['errors']['phoneError'] = "Telefoonnummer invullen a.u.b.";
            } else {
                $data['phone'] = formatInput($_POST["phone"]);
        
                if (!preg_match("/^[0-9--]*$/",$data['phone'])) {
                    $data['errors']['phoneError'] = "alleen cijfers en '-' gebruiken a.u.b.";
                }
            }
        
            if (isset($_POST["compref"]) && array_key_exists($_POST["compref"], COM_PREFS)) {
                $data['compref'] = formatInput($_POST["compref"]); 
            } else {
                $data['errors']['comprefError'] = "Geef a.u.b. aan of u liever gebeld of gemaild wil worden.";
            }
        
            if (empty($_POST["message"])) {
                $data['errors']['messageError'] = "Typ a.u.b. een bericht, lege berichten worden genegeerd.";
            } else {
                $data['message'] = formatInput($_POST["message"]); 
            }
        
            if (empty($data['errors'])) {
                $data['valid'] = true;
            }
        }
        return $data;
    }

    function validateRegistrationForm() {
        $data = array(
            "valid" => false,
            "errors" => array()
        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['userName'])) {
                $data['userName'] = formatInput($_POST['userName']);

                if(empty($data['userName'])) {
                    $data['errors']['userNameError'] = "Username cannot be empty";
                }

            } else {
                $data['errors']['userNameError'] = "Please choose a username";
            }

            if(empty($_POST['userEmail'])) {
                $data['errors']['userEmailError'] = "Please provide email";
            } else {
                $data['userEmail'] = formatInput($_POST['userEmail']);

                if (!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
                    $data['errors']['userEmailError'] = "Geen valide e-mail adres"; 
                }
            }

            if(empty($_POST['userPassword'])) {
                $data['errors']['userPasswordError'] = "Please Choose a password";
            } else {
                $data['userPassword'] = formatInput($_POST['userPassword']);

                if (strlen($data['userPassword']) < 9) {
                    $data['errors']['userPasswordError'] = "Password must be 8 or more characters"; 
                }
            }

            if(!empty($data['userPassword'])) {
                if(empty($_POST['checkPassword'])) {
                    $data['errors']['checkPasswordError'] = "Please retype password";
                } else {
                    $data['checkPassword'] = formatInput($_POST['checkPassword']);

                    if (strcmp($data['userPassword'], $data['checkPassword']) !== 0) {
                        $data['errors']['checkPasswordError'] = "Passwords do not match";
                    }
                }
            }

            if (empty($data['errors'])) {
                $data['valid'] = true;
            }
        }

        return $data;
    }

    function validateLoginForm() {
        $data = array(
            "valid" => false,
            "errors" => array()
        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(empty($_POST['loginEmail'])) {
                $data['errors']['loginEmailError'] = "Please provide email";
            } else {
                $data['loginEmail'] = formatInput($_POST['loginEmail']);

                if (!filter_var($data['loginEmail'], FILTER_VALIDATE_EMAIL)) {
                    $data['errors']['loginEmailError'] = "Geen valide e-mail adres";
                }
            }

            if (empty($_POST['loginPassword'])) {
                $data['errors']['loginPasswordError'] = "Please provide your password";
            } else {
                $data['loginPassword'] = formatInput($_POST['loginPassword']);
            }

            if (empty($data['errors'])) {
                $data['valid'] = true;
            }
        }

        return $data;
    }   
?>