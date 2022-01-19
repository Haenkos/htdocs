<?php
include_once "../../presentation/About_Doc.php";

$data = array ( 'page' => 'about' );

$view = new AboutDoc($data);
$view  -> show();
?>