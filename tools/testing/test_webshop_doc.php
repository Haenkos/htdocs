<?php
include_once '../../presentation/Webshop_Doc.php';
include_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\io\productsIO.php';

$data = array('page' => 'webshop');

try {
    $data['productsList'] = getAllProducts();
    $view = new WebshopDoc($data);
    $view->show();
} catch (Exception $e) {
    echo $e;
}


