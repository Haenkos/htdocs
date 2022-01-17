<?php
require_once 'io/ordersIO.php';
require_once 'sessionManager.php';
require_once 'tools/debug.php';

function processActions() {
    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
            case 'addToCart':
                updateCart($_GET['cartItemID']);
                break;

            case 'checkout':
                if(!checkAnyLoggedIn()) {
                    console_log("No user logged in on action=checkout");
                    $page = "login";
                    return $page;
                    break;
                } else {
                    console_log('some user is loggedin on action=checkout');
                    storeOrder();
                    emptyCart();
                    $page = 'webshop';
                }
        }

        return $_GET['page'];
    }
}