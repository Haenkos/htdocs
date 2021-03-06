<?php
// https://www.phptutorial.net/php-tutorial/php-session/

require_once 'userService.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\io\database_acces_layer.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\tools\debug.php';

function loginUser($userName) {
    $_SESSION['userName'] = $userName;
}

function checkAnyLoggedIn() {
    if (isset($_SESSION['userName'])) {
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
        return false; /* JH: In dit soort datalaag functies is het gebruikelijk om dan een lege array terug te geven, zodat je bij de aanroep niet hoeft te controleren of er een array of false is teruggekomen. In C# kan je niet eens een ander type teruggeven, dus dan is een lege array of NULL je enige opties */
    }
}

function emptyCart() {
    unset($_SESSION['cart']);
}
?>