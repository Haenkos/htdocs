<?php
    require_once 'validations.php';

    function processRequest($page) {
        switch ($page) {
            case 'contact':
                $data = validateContactForm();
                return $data;
                break; 
            default:
                $data = array("page" => "$page", "valid" => false);
                return $data;
                break;
        }
    }

?>