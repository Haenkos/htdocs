<?php

require_once 'database_acces_layer.php';
require_once 'productsIO.php';
require_once 'tools/debug.php';

function storeOrder() {
    $link = openDatabase();

    //$productsList = getAllProducts();
    $userID = getUserID(getLoggedInUser()); /* JH: Beter om de $userId en $cart aan de functie mee te geven */

    console_log('userID is: '. $userID);

    $cart = getCart();

    $date = date('Y/m/d');

    $query = "INSERT INTO orders (userID, orderDate) VALUES ('$userID', '$date')";
    
    if (mysqli_query($link, $query)) {
        console_log('order created succesfully');
    } else {
        throw new Exception('Error storing order data in database ' . mysqli_error($link));
    }

    $lastID = mysqli_insert_id($link);

    foreach ($cart as $itemID => $amount) {
        $query = "INSERT INTO ordersproducts (orderID, productID, amount) VALUES ('$lastID', '$itemID', '$amount')";
        
        if (mysqli_query($link, $query)) {
            console_log('order filled up succesfully');
        } else {
            throw new Exception('Error storing product ID\'s in database' . mysqli_error($link));
        }
    }
}
?>
