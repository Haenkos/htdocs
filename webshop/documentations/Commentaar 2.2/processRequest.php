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
                    /* JH: De functie hieronder doet twee dingen, hij authoriseerd de user en zet hem in de sessie, dit zou ik in twee stappen doen */
                    $userLog = loginUser($data['loginEmail'], $data['loginPassword']); /* JH: De opdracht was om de naam op te slaan in de sessie, niet het email adres en ZEKER niet het password */
                
                    if ($userLog == 2 /* JH: Zie opmerking in userservice regel 9 */) {
                        $data['errors']['loginPasswordError'] = "Wrong password";
                    } elseif ($userLog == 1) {
                        $data['errors']['loginEmailError'] = "email/user does not exist";
                    } else {
                        /* JH: Ik had hier een loginUser($userLog['userName']); verwacht */
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