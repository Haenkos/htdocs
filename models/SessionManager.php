<?php

class SessionManager
{
    public  function loginUser($userName) {
        $_SESSION['userName'] = $userName;
    }
    
    public function checkAnyLoggedIn() {
        if (isset($_SESSION['userName'])) {
            console_log('Identified a user is logged in from checkAnyLoggedIn');
            return true;
        } else {
            console_log('Identified NO user is logged in from checkAnyLoggedIn');
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