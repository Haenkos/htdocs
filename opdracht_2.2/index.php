<?php
    require_once 'page_request_handler.php';
    require_once 'presentation.php';
    require_once 'processRequest.php';

$page = getRequestedPage();

$data = processRequest($page);

showResponsePage($data);

?>