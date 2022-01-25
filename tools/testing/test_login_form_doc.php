<?php
include_once "../../views/Login_Form_Doc.php";

$data = array ('page' => 'login', 'errors' => array());

$view = new LoginFormDoc($data);
$view  -> show();
?>