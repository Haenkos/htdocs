<?php
include_once '../../presentation/Product_Page_Doc.php';
include_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\io\productsIO.php';

try {
    $data = array('page' => 'productPage', 'product' => getProductByID(3));
    $view = new ProductPageDoc($data);
    $view->show();
} catch (Exception $e) {
    echo $e;
}


