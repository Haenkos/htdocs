<?php
    require_once 'validations.php';

    function processRequest($page) {
        switch ($page) {
            case 'contact':
                $data = validateContactForm();
                if ($data['valid']) {
                    $page = 'thanks';
                }
                break; 
            
        }
        $data['page'] = $page;
        return $data;
    }

?>