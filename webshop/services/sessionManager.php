<?php
// https://www.phptutorial.net/php-tutorial/php-session/

require_once 'userService.php';
require_once 'io/userfileFilehandler.php';

function loginUser($email, $password) {
    $user = getUser($email);
    if (!$user) {
        return 1;
    } elseif (strcmp($password, $user['userPassword']) == 0) {
        $_SESSION = $user;
        return 0;
    } else {
        //this means wrong password
        return 2;
    }
}

function checkLogin($email) {
    if (strcmp($_SESSION['$email'], $email) == 0) {
        return true;
    } else {
        return false;
    }
}

function getLoggedInUser() {
    return $_SESSION['userName'];
}

function logOutUser() {
    unset($_SESSION);
    session_destroy();
}
?>
