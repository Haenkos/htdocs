<?php
function console_log($data) {
    echo '<script>';
    echo 'console.log('. json_encode($data) .')';
    echo '</script>';
}

function debugData($data) {

    echo '<div>
                <pre>$_GET: '; var_dump($_GET); echo '</pre>
                <pre>$_POST: '; var_dump($_POST); echo '</pre>
                <pre>$data: '; print_r($data); echo '</pre>';
    if (isset($_SESSION)) {echo '<pre>$_SESSION: '; var_dump($_SESSION);}
    echo '</div>';
}

?>