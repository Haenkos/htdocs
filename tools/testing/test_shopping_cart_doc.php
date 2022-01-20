<?php
include_once '../../presentation/ShoppingCart_Doc.php';
include_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\io\productsIO.php';
include_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\services\sessionManager.php';

$data = array('page' => 'cart');
$_SESSION = array('cart'=> array('4'=>3, '5' => 2));

try {
    $data['productsList'] = getAllProducts();
    $view = new ShoppingCartDoc($data);
    $view->show();
} catch (Exception $e) {
    echo $e;
}
