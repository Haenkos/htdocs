<?php
include_once "../../presentation/Contact_Form_Doc.php";

$data = array ('page' => 'contact', 'errors' => array());

$view = new ContactFormDoc($data);
$view  -> show();
?>