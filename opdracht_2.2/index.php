<?php
<<<<<<< HEAD
=======
    require_once 'presentation.php';
    require_once 'file_handling.php';
    require_once 'request_handling.php';
    require_once 'request_processing.php';
    require_once 'contact_form.php';
    require_once 'contact_thanks.php';
>>>>>>> c77548d651442af648283231e3b97f8a5a93be98

//============================================== 
// MAIN APP 
//============================================== 
<<<<<<< HEAD
$page = getRequestedPage(); 
showResponsePage($page); 
//============================================== 
// FUNCTIONS 
//============================================== 
function getRequestedPage() 
{     
   $requested_type = $_SERVER['REQUEST_METHOD']; 
   if ($requested_type == 'POST') 
   { 
       $requested_page = getPostVar('page','home'); 
   } 
   else 
   { 
       $requested_page = getUrlVar('page','home'); 
   } 
   return $requested_page; 
} 
//============================================== 
function showResponsePage($page) 
{ 
   beginDocument(); 
   showHeadSection(); 
   showBodySection($page); 
   endDocument(); 
}     
//============================================== 
function getArrayVar($array, $key, $default='') 
{ 
   return isset($array[$key]) ? $array[$key] : $default; 
} 
//============================================== 
function getPostVar($key, $default='') 
{ 
    return getArrayVar($_POST, $key, $default);

    /* Or use the modern variant below, a better way than accessing super global "$_POST"
  
       see https://www.php.net/manual/en/function.filter-input.php
       for extra options 

       $value = filter_input(INPUT_POST, $key); 
        
       return isset($value) ? $value : $default; 
    */
} 
//============================================== 
function getUrlVar($key, $default='') 
{ 
   return getArrayVar($_GET, $key, $default);
} 
//============================================== 
function beginDocument() 
{ 
   echo '<!doctype html> 
<html>'; 
} 
//============================================== 
function showHeadSection() 
{ 
  echo '<head>
            <title>Opdracht 2.1</title>
            <link rel="stylesheet" href="css/styles.css">
        </head>';
} 
//============================================== 
function showBodySection($page) 
{ 
   echo '    <body>' . PHP_EOL; 
   showHeader($page);
   showMenu(); 
   showContent($page); 
   showFooter(); 
   echo '    </body>' . PHP_EOL; 
} 
//============================================== 
function endDocument() 
{ 
   echo  '</html>'; 
} 
//============================================== 
function showHeader($page) 
{ 
    echo '<header>
            <h1>' . ucfirst($page) . '</h1>
        </header>';
} 
//============================================== 
function showMenu() 
{ 
  echo '<nav>
            <ul>
                <li>
                    <a href="index.php">home</a>
                </li>
                <li>
                    <a href="index.php?page=about">About</a>
                </li>
                <li>
                    <a href="index.php?page=contact">Contact</a>
                </li>
            </ul>
        </nav>';
} 
//============================================== 
function showContent($page) 
{ 
   switch ($page) 
   { 
        case 'home':
            require('home.php');
            showHomeContent();
            break;
        case 'about':
            require('about.php');
            showAboutContent();
            break;
        case 'contact':
            require('contact.php');
            showContactcontent();
            break;

   }     
} 
//============================================== 
function showFooter() 
{ 
  echo '<footer>
            <p>
                &copy; Matthijs van Dijk, 2021
            </p>
        </footer>';
} 
//============================================== 
// Verdere functies zelf invullen.... 
=======
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

>>>>>>> c77548d651442af648283231e3b97f8a5a93be98
?>