<?php
// https://www.phptutorial.net/php-tutorial/php-session/

require_once 'userService.php';
require_once 'userfileFilehandler.php';

function loginUser($email, $password) {
    $user = getUser($email);
    if (!$user) {
        return NULL;
    } elseif (strcmp($password, $user['userPassword']) == 0) {
        session_start();
        $_SESSION = $user;
    } else {
        return "wrongpassword";
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
