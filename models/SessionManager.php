<?php

class SessionManager
{
    public  function loginUser($user) {
        $_SESSION['userName'] = $user['userName'];
        $_SESSION['userID'] = $user['userID'];
    }
    
    public function isUserLoggedIn() {
        if (isset($_SESSION['userName'])) {
            //console_log('Identified a user is logged in from checkAnyLoggedIn');
            return true;
        } else {
            //console_log('Identified NO user is logged in from checkAnyLoggedIn');
            return false;
        }
    }
    
    public function getLoggedInUser() {
        return $_SESSION['userName'];
    }
    
    public function logOutUser() {
        unset($_SESSION);
        session_destroy();
    }
}