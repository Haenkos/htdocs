<?php

//============================================== 
// MAIN APP 
//============================================== 
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
?>