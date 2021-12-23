<?php
    require_once 'validations.php';
    require_once 'userService.php';
    require_once 'sessionManager.php';
    
    function processRequest($page) {
        switch ($page) {
            case 'contact':
                $data = validateContactForm();
                if ($data['valid']) {
                    $page = 'thanks'; //TODO: add 'thanks' page from contact
                }
                break;

            case 'registration':
                $data = validateRegistrationForm();
                if ($data['valid']) {
                    if(!doesUserExist($data['userEmail'])) { 
                        saveUser($data['userName'], $data['userEmail'], $data['userPassword']);
                        $page = 'login';
                    } else {
                        $data['errors']['userEmailError'] = "Email already in use, choose another email";
                    }    
                }
                break;

        }

        $data['page'] = $page;
        
        return $data;
    }

?>