<?php
    session_start();
    
    require_once 'io/page_request_handler.php';
    require_once 'presentation/presentation.php';
    require_once 'services/processRequest.php';

$page = getRequestedPage();

$data = processRequest($page);

showResponsePage($data);

?>