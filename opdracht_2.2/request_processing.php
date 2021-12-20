<?php
    require_once 'presentation.php';
    require_once 'file_handling.php';
    require_once 'request_handling.php';
    require_once 'request_validations.php';
    require_once 'request_processing.php';
    require_once 'contact_form.php';
    require_once 'contact_thanks.php';

    function processRequest($page) {

        switch ($page) {
            case 'register':
                $data = validateRegistration();
                break;
            case 'login':
                $data = validateLogin();
                break;
            case 'contact':
                $data = validateContact();
                break;
        }

        return $data;
    }
?>