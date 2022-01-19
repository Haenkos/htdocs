<?php
include_once "../../presentation/Basic_Doc.php";

$data = array ( 'page' => 'home' );

$view = new BasicDoc($data);
$view  -> show();
?>