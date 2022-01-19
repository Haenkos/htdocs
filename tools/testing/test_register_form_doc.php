<?php
include_once "../../presentation/Register_Form_Doc.php";

$data = array ('page' => 'login', 'errors' => array());

$view = new RegisterFormDoc($data);
$view  -> show();
?>