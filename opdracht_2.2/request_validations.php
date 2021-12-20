<?php

require_once 'presentation.php';
require_once 'file_handling.php';
require_once 'request_handling.php';
require_once 'request_validations.php';
require_once 'request_processing.php';
require_once 'contact_form.php';
require_once 'contact_thanks.php';

function formatInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function validateRegistration() {
    $data = array(
        "page" => "",
        "valid"=> false
    );

    //TODO write functionality

    return $data;
}

function validateLogin() {
    $data = array(
        "page" => "",
        "valid" => false
    );

    //TODO write functionality

    return $data;
}

function validateContact() {
    $data = array(
        "gender" => "",
        "name" => "",
        "email" => "",
        "phone" => "",
        "compref" => "",
        "message" => "",
        "page" => "",
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
            //TODO: Update dropdown menu to use GENDERS. 
            $data['gender'] = $_POST['gender'];
        } else {
            $data['genderError'] = "Kies aanhef"; //TODO: Voeg genderError toe aan dropdown-menu
        }
    
        if (isset($_POST["name"])) {
            $data['name'] = formatInput($_POST["name"]);
            if (empty($data['name'])) {
                $data['nameError'] = "Naam invullen a.u.b."; //TODO: $data['name']  en $data['nameError'] in html vervangen voor array-versie
            }
        } else {
            $data['nameError'] = "Naam invullen a.u.b.";
            
        }
    
        if (empty($_POST["email"])) {
            $data['emailError'] = "Email invullen a.u.b.";
        } else {
            $data['email'] = formatInput($_POST["email"]);
    
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "Geen valide e-mail adres"; //TODO: $data['email'] en $data['emailError'] in html vervangen
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
    
        if (array_key_exists($_POST["compref"], COM_PREFS)) {
            $data['compref'] = formatInput($_POST["compref"]); //TODO radiobuttons aanpassen naar COM_PREFS[]
        } else {
            $data['comprefError'] = "Geef a.u.b. aan of u liever gebeld of gemaild wil worden.";
        }
    
        if (empty($_POST["message"])) {
            $data['messageError'] = "Typ a.u.b. een bericht, lege berichten worden genegeerd.";
        } else {
            $data['message'] = formatInput($_POST["message"]); //TODO: fix this error message in the html below
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