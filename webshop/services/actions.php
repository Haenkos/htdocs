<?php

function processActions() {
    switch ($_GET['action']) {
        case 'addToCart':
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array(
                    $_GET['cartItemID']
                );
            } else {
                array_push($_SESSION['cart'], $_GET['cartItemID']);
            }
            break;
        case 'checkout':
            //storeOrder();
            //unset($_Session['cart']);
    }
}