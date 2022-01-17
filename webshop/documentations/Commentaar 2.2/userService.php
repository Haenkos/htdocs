<?php

require_once 'database_acces_layer.php';

    function userAuthentication($userEmail, $userPassword) {
        $user = getUser($userEmail);
        
        if (!isset($user)) {
            return -1; /* JH TIP: Het teruggeven van errorcodes is een oudere techniek van de jaren 90, maar als je hem toch wilt gebruiken zou ik voorstellen om het te doen met defines dus bovenin de file zet je define("RESULT_UNKNOWN_USER", -1); define("RESULT_WRONG_PASSWORD", -2); define("RESULT_OK",0); Deze kan je dan in de validaties ook in de switch-cases gebruiken */
        } elseif (strcmp($userPassword, $user["userPassword"]) != 0) {
            return 0;
        } else {
            return 1; /* JH: Het is de bedoeling dat je de naam van de gebruiker hier ook teruggeeft, omdat je die moet opslaan om aan de logout button te hangen. Je kan hier doen: return array('result' => RESULT_OK, "name" => $user['name']); */
        }
    }

    function saveUser ($userName, $userEmail, $userPassword) {
        storeUser($userName, $userEmail, $userPassword);
    }

    function doesUserExist($userEmail) {
        $user = getUser(($userEmail)); /* JH TIP: Je kan dit korter doen door te schijven return isset(getUser($userEmail)); */

        if (isset($user)) {
            return true;
        } else {
            return false;
        }
    }
?>