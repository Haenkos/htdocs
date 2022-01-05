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

            case 'login':
                $data = validateLoginForm();
                if ($data['valid']) {
                    $userLog = loginUser($data['loginEmail'], $data['loginPassword']);
                
                    if ($userLog == 2) {
                        $data['errors']['loginPasswordError'] = "Wrong password";
                    } elseif ($userLog == 1) {
                        $data['errors']['loginEmailError'] = "email/user does not exist";
                    } else {
                        $page = 'home';
                    }
                }
                break;

            case 'logout':
                logOutUser();
                $page = 'home';
                break;
        }

        $data['page'] = $page;
        
        return $data;
    }

?>