<?php
// https://www.phptutorial.net/php-tutorial/php-session/

require_once 'userService.php';           /* JH: Dit is NIET correct, sessionManager heeft geen andere dependencies nodig, geef de informatie mee met de functies */
require_once 'database_acces_layer.php';

function loginUser(/* JH: Ik had alleen $userName verwacht hier */ $email, $password) {
    /* JH: Hier gaat een datalaag functie naar een businesslaag, dit is niet correct, Geef de usernaam mee als string aan deze functie en sla alleen de naam op in de sessie (EN ZEKER NIET HET HELE USER OBJECT MET HET PASSWORD) */
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

/* JH: Deze functie wordt nergens gebruikt, verwijder hem */
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
