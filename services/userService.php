<?php

require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\io\database_acces_layer.php';

    function userAuthentication($userEmail, $userPassword) {
        $user = getUser($userEmail);
        
        if (!isset($user)) {
            return "No user found";
        } elseif (strcmp($userPassword, $user["userPassword"]) != 0) {
            return "Wrong password";
        } else {
            return $user['userName'];
        }
    }

    function saveUser ($userName, $userEmail, $userPassword) {
        storeUser($userName, $userEmail, $userPassword);
    }

    function doesUserExist($userEmail) {
        $user = getUser($userEmail);

        if (isset($user)) {
            return true;
        } else {
            return false;
        }
    }

    
?>