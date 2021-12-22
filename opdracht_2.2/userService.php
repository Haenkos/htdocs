<?php
    function userAuthentication($userEmail, $userPassword) {
        $user = getUser($userEmail);
        if (!isset($user)) {
            return -1;
        } elseif (strcmp($userPassword, $user["userPassword"]) != 0) {
            return 0;
        } else {
            return 1;
        }
    }

    function saveUser ($userName, $userEmail, $userPassword) {
        storeUser($userName, $userEmail, $userPassword);
    }

    function doesUserExist($userEmail) {
        $user = getUser(($userEmail));

        if (isset($user)) {
            return true;
        } else {
            return false;
        }
    }
?>