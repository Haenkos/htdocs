<?php
function console_log($data) { /* JH: Hmm dit is javascript, was niet onderdeel van de opdracht */
    echo '<script>';
    echo 'console.log('. json_encode($data) .')';
    echo '</script>';
}

?>