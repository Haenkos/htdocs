<?php
include_once "../../presentation/Home_Doc.php";

$data = array ( 'page' => 'home' );

$view = new HomeDoc($data);
$view  -> show();
?>