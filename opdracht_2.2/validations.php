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
            "genderError" => "",
            "nameError" => "",
            "emailError" => "",
            "phoneError" => "",
            "comprefError" => "",
            "messageError" => ""
        );

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (array_key_exists($_POST['gender'], GENDERS)) {
                if ($_POST['gender'] == GENDERS['anders/geen']) {
                    $data['gender'] == "";
                } else {
                    $data['gender'] = $_POST['gender'];
                }
            } else {
                $data['genderError'] = "Kies aanhef"; 
            }
        
            if (isset($_POST["name"])) {
                $data['name'] = formatInput($_POST["name"]);

                if (empty($data['name'])) {
                    $data['nameError'] = "Naam invullen a.u.b."; 
                }
            } else {
                $data['nameError'] = "Naam invullen a.u.b.";
                
            }
        
            if (empty($_POST["email"])) {
                $data['emailError'] = "Email invullen a.u.b.";
            } else {
                $data['email'] = formatInput($_POST["email"]);
        
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = "Geen valide e-mail adres"; 
                }
            }
        
            if (empty($_POST["phone"])) {
                $data['phoneError'] = "Telefoonnummer invullen a.u.b.";
            } else {
                $data['phone'] = formatInput($_POST["phone"]);
        
                if (!preg_match("/^[0-9--]*$/",$data['phone'])) {
                    $data['phoneError'] = "alleen cijfers en '-' gebruiken a.u.b.";
                }
            }
        
            if (isset($_POST["compref"]) && array_key_exists($_POST["compref"], COM_PREFS)) {
                $data['compref'] = formatInput($_POST["compref"]); 
            } else {
                $data['comprefError'] = "Geef a.u.b. aan of u liever gebeld of gemaild wil worden.";
            }
        
            if (empty($_POST["message"])) {
                $data['messageError'] = "Typ a.u.b. een bericht, lege berichten worden genegeerd.";
            } else {
                $data['message'] = formatInput($_POST["message"]); 
            }
        
            if (
                empty($data['nameError']) &&
                empty($data['emailError']) &&
                empty($data['phoneError']) &&
                empty($data['comprefError']) &&
                empty($data['messageError'])
                ) {
                $data['valid'] = true;
            }
        }
        return $data;
    }
?>