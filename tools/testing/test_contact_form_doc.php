<?php
include_once "C:\Bitnami\wampstack-8.1.2-0\apache2\htdocs\views\Contact_Form_Doc.php";

$data = array ('page' => 'contact', 'errors' => array(), 'form' => '');

$view = new ContactFormDoc($data);
$view->show();
?>