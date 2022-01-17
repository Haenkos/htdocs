<?php
// https://www.phptutorial.net/php-tutorial/php-session/

require_once 'userService.php';
require_once 'io/userfileFilehandler.php';
require_once 'tools/debug.php';

function loginUser($email, $password) {
    $user = getUser($email);
    if (!$user) {
        return 1;
    } elseif (strcmp($password, $user['userPassword']) == 0) {
        $_SESSION['userName'] = $user['userName'];
        $_SESSION['userEmail'] = $user['userEmail'];
        $_SESSION['userPassword'] = $user['userPassword'];
        return 0;
    } else {
        //this means wrong password
        return 2;
    }
}

function checkLogin($email) {
    if (strcmp($_SESSION['userEmail'], $email) == 0) {
        return true;
    } else {
        return false;
    }
}

function checkAnyLoggedIn() {
    if (isset($_SESSION['userEmail'])) {
        console_log('Identified a user is logged in from checkAnyLoggedIn');
        return true;
    } else {
        console_log('Identified NO user is logged in from checkAnyLoggedIn');
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

function updateCart($itemID) {
    
    if(!isset($_SESSION['cart'])) {

        $_SESSION['cart'] = array(
            $itemID => 1
        );

    } elseif (array_key_exists($itemID, $_SESSION['cart'])) {

        $_SESSION['cart'][$itemID] += 1;

    } else {

        $_SESSION['cart'][$itemID] = 1;

    }
}

function getCart() {
    if (!empty($_SESSION['cart'])) {
        return $_SESSION['cart'];
    } else {
        return false;
    }
}

function emptyCart() {
    unset($_SESSION['cart']);
}
?>