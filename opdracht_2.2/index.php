<?php
    require_once 'presentation.php';
    require_once 'file_handling.php';
    require_once 'request_handling.php';
    require_once 'request_processing.php';
    require_once 'contact_form.php';
    require_once 'contact_thanks.php';

//============================================== 
// MAIN APP 
//============================================== 
$page = getRequestedPage();

$data = processRequest($page);


//the logic below is that if 'data[valid] is set, it has to be a POST request.
//if not, it has to be GET. Then if data[valid] is 'false' then nothing needs to happen
//so we only check for data[valid] is 'true'. and then we check which page has
//has valid=true to execute specific commands.
if (isset($data['valid'])) {
    //POST
    if ($data['valid']){
        switch ($data['page']){
            case 'register':
                //saveUser();
                $data['page'] = 'home';
                break;
            case 'login':
                //LoginUser();
                $data['page'] = 'home';
                break;
            case 'contact':
                $data['page'] = 'thanks';
        }

        $page = $data['page'];
    }
} else if ($data['page'] == 'logout') {
    //GET
    //LogOutUser();
    $page = "home";
}

showResponsePage($page, $data); 

?>